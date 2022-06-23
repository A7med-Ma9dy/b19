<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register()
    {
        return view('Auth.register');
    }

    public function all()
    {
        $users = User::all();
        return view('Auth.users',compact('users'));
    }
}
