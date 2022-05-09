<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('login');
    }
    public function postLogin(Request $request)
    {
        $loginh = $request->only('email', 'password');

        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password],1)) {
            //if (Auth::attempt($loginh)) {
            return redirect()->route('adminindex');
        } else {
            $message = 'Email và mật khẩu không hợp lệ!';
            $request->session()->flash('fail-login', $message);

            return redirect()->route('login');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
