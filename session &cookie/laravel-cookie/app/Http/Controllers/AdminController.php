<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function showFormLogin(Request $request)

   {

        return view('admin_login');

    }



    function login(Request $request)

    {

        $data = $request->only(['phone','password']);
        

        if (Auth::guard('admin123')->attempt($data)) {
            dd('Dang nhap thanh cong');

        //     $cookie = cookie('email', $request->email);

        //     $cookiePassword = cookie('password', $request->password);

        //     return redirect()->route('home.index')->cookie($cookie)->cookie($cookiePassword);

        }



        // return back();

    }

}
