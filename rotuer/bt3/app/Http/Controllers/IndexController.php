<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        echo __METHOD__;
    }
    public function create(){
        echo __METHOD__;
    }
    public function store(Request $request){
        echo __METHOD__;
    }
    public function show($id){
        echo __METHOD__;
    }
    public function edit($id){
        echo __METHOD__;
    }
    public function update($id, Request $request){
        echo __METHOD__;
    }
    public function destroy($id, Request $request){
        echo __METHOD__;
    }
}
