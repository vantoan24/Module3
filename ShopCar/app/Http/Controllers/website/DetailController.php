<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $gio_hang = session('cart',[]); // []
        $ids = array_keys($gio_hang);
        $quantilys = session('detail',[]);
        $product = Product::where('id', $id)->first();
        $images = $product->image;
        $products = Product::paginate(4);
        // dd($product->image);
        return view('website.shop.shop-details', compact('product','products','images','quantilys','gio_hang'));
    }
    public function create($product_id, $quantily = 1){
        $quantilys = session('detail',[]);
        if( isset($quantilys[$product_id]) ){
            $quantilys[$product_id] += $quantily;
        }else{
            $quantilys[$product_id] = $quantily;
        }
        $quantilys = $request->quantily;
        session(['detail'=>$quantilys]);
        return redirect()->route('website.shop.my-cart');         
    }
    
}
