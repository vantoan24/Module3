<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalcuController extends Controller
{
    public function index(){
        echo __METHOD__;
        return view('calcu');
    }
}
