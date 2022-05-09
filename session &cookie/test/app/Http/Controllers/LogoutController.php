<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function LogOut(Request $request){
        $request->session()->flush();
        return view('login');
    }
}
