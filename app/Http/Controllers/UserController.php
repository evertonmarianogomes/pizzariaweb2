<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function createUser(Request $request){
        $user = new User();
        $user->first_name = filter_var($request->first_name, 515);
        $user->last_name = filter_var($request->last_name, 515);
        $user->email = filter_var($request->user_email, 515);
        $user->login = filter_var($request->user_login, 515);
        $user->password = Hash::make($request->user_password);
        $user->assignRole((int) $request->user_type);
        $user->save();
    }
}
