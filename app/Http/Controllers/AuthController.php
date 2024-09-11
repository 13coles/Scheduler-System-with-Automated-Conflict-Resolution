<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{   
    public function registerFunction() {
        return view('auth.register');
    }
    public function loginFunction() {
        return view('auth.login');
    }
}
