<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;


class AuthController extends Controller
{
    private $about;

    public function __construct()
    {
        $this->about = DB::table('about')->get()->where("isSelected", 1)->first();
        View::share("about", $this->about);
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view("admin.dashboard", ["title" => "Dashboard - Pizzaria Web 2"]);
        } else if (session()->has('success')) {
            return redirect()->route("admin.login")->with(["success" => session()->get('success')]);
        }

        return redirect()->route("admin.login")->withErrors("Somente usuários autenticados podem acessar esse endereço.");
    }

    public function showLoginForm()
    {

        if (!Auth::check()) {
            return view("login", ["title" => "Login - Pizzaria Web 2"]);
        }

        return redirect()->route("admin");
    }

    private function welcomeMessage(): string
    {
        $hour = (int) date("H");

        return ($hour >= 5 && $hour <= 11) ? "Bom dia!" : (($hour >= 12 && $hour <= 17) ? "Boa Tarde!" : "Boa Noite!") . " Seja Bem vindo " . Auth::user()->first_name;
    }

    public function validateLogin(Request $request)
    {
        $credentials = [
            "login" => $request->login,
            "password" => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $redirectRoute = $request->query('redirect');

            if ($redirectRoute) {
                // Redireciona para a rota especificada na query string
                return redirect()->intended(($redirectRoute))->with(["success" => $this->welcomeMessage()]);
            } else {
                // Redireciona para uma rota padrão
                return redirect()->route('admin')->with(["success" => $this->welcomeMessage()]);
            }
        }
        return redirect()->back()->withInput()->withErrors(["Usuário e/ou senha incorretos"]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("admin.login")->with(["success" => "Usuário desconectado com sucesso"]);
    }
}
