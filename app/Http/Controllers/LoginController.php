<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function auth(Request $request) {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'The email field is required.',
            'email.email' => 'Invalid email',
            'password.required' => 'The password field is required.'
        ]
    );

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        } else {
            return redirect()->back()->with('error', 'invalid email or password');
        }
    }
}
