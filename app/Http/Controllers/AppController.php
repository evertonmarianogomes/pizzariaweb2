<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\About;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Inertia\Inertia;


class AppController extends Controller
{
    private $about;

    public function __construct()
    {
        $this->about = About::get()->where("isSelected", 1)->first();
        // Legacy Code - Don't remove
        View::share("about", $this->about);

        Inertia::share("about", $this->about);

        Inertia::share('app', function () {
            return [
                'appName' => env("APP_NAME"),
                'appRelease' => env('APP_RELEASE'),
                'appVersion' => env("APP_VERSION"),
                "laravelVersion" => \Illuminate\Foundation\Application::VERSION,
                "phpVersion" => PHP_VERSION
            ];
        });

        Inertia::share(
            'user',
            function (Request $request) {
                if (Auth::user()) {
                    $user = Auth::user();
                } else {
                    $user =  null;
                }
                return $user;
            }
        );
    }

    public function viewEditCurrentUser(Request $request)
    {
        if (Auth::check()) {
            return view("admin.editCurrentUser", ["title" => "Editar usuário - " . env("APP_NAME")]);
        } else {
            return redirect()->route("admin.login", ["redirect" => $request->path()])->withErrors("Somente usuários autenticados podem acessar esse endereço");
        }
    }

    public function viewEditAbout(Request $request)
    {
        if (Auth::check()) {
            $params = [
                "title" => "Editar Sobre - " . env("APP_NAME"),
                "aboutList" => About::get(),
                "carbon" => Carbon::class
            ];
            return view("admin.editAbout")->with($params);
        } else {
            return redirect()->route("admin.login", ["redirect" => $request->path()])->withErrors("Somente usuários autenticados podem acessar esse endereço");
        }
    }


    public function viewUsers(Request $request)
    {
        if (Auth::check()) {
            $params = [
                "title" => "Usuários - " . env("APP_NAME"),
                "carbon" => Carbon::class,
                "users" => User::all()
            ];
            return view("admin.users.viewUsers")->with($params);
        } else {
            return redirect()->route("admin.login", ["redirect" => $request->path()])->withErrors("Somente usuários autenticados podem acessar esse endereço");
        }
    }

    public function home(Request $request)
    {

        if (Auth::user()) {
            $params = [
                "Title" => "Vue Dashboard - Pizzaria Web 2"
            ];
            return Inertia::render('App', $params);
        } else {
            return redirect()->route("admin.login", ["redirect" => $request->path()])->withErrors("Somente usuários autenticados podem acessar esse endereço");
        }
    }

    public function dashboard(Request $request)
    {
        if (Auth::check()) {
            $params = [
                "Title" => "Dashboard - " . env("APP_NAME")
            ];
            return Inertia::render('Dashboard', $params);
        } else {
            return redirect()->route("admin.login", ["redirect" => $request->path()])->withErrors("Somente usuários autenticados podem acessar esse endereço");
        }
    }
}
