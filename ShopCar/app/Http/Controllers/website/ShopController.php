<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class ShopController extends Controller
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
        $categories = Category::all();
        $products = Product::all();
        return view('website.shop.shop-page', compact('products','cart_products','gio_hang','categories'));
    }

    public function search(Request $request)
    {
        $gio_hang = session('cart',[]); // []
        $ids = array_keys($gio_hang);
        $product = Product::where('name','like', "%$request->search%")->first();
        return view('website.shop.search_shop',compact('gio_hang','product'));
    }

}
