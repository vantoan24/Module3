<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Checkout;


class CheckoutController extends Controller
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
        $products = Product::whereIn('id',$ids)->get();
        return view('website.shop.checkout',  compact('products', 'gio_hang'));
    }
    public function post_checkout( Request $request ) {
     
        $checkout = new Checkout();
        $checkout->user_name = $request->user_name;
        $checkout->address = $request->address;
        $checkout->email = $request->email;
        $checkout->user_phone = $request->user_phone;
        $checkout->message = $request->message;
        
        $checkout->save();
        $request->session()->forget('cart');
        return view('website.shop.ordered');

    }


}
