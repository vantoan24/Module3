<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gio_hang = session('cart',[]); // []
        $ids = array_keys($gio_hang);
        return view('website.shop.contact', compact('gio_hang'));
    }

}