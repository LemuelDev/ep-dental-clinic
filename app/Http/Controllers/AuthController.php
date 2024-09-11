<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    
    public function login() {
        return view("shared.login");
    }

    public function signup() {
        return view("shared.signup");
    }

    public function forgotPassword() {
        return view("shared.forgot-password");
    }

    



}
