<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
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
        $cart_products = Product::whereIn('id',$ids)->get();
        
        $products = Product::paginate(8);
        return view('website.home.index', compact('products', 'gio_hang','cart_products'));
    }  
    public function search(Request $request) {
        $gio_hang = session('cart',[]); // []
        $ids = array_keys($gio_hang);
        $product = Product::where('name','like', "%$request->search%")->first();
        return view('website.home.search',compact('gio_hang','product'));
    }  
}
