<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;


class GioHangController extends Controller
{
    
    // public function __construct(){
    //     session()->put('cart',[]);
    // }

    public function index(Request $request){
        $gio_hang = session('cart',[]); // []
 
        $ids = array_keys($gio_hang);
       
        $products = Product::whereIn('id',$ids)->get();
        return view('website.shop.my-cart',  compact('products', 'gio_hang'));
        // echo '<pre>';
        // dd( $products );
        //  echo '</pre>';
    }

    public function add_to_cart($product_id, $quantily = 1 ){
        //gán vào biến giỏ hàng từ session, ko có thì là MẢNG rỗng
       $gio_hang = session('cart',[]); // []

       //kiểm tra product_id đã tồn tại trong mảng hay không
       if( isset($gio_hang[$product_id]) ){
            //có => cộng dồn số lượng
            $gio_hang[$product_id] += $quantily;
       }else{
           //không có => đặt cho nó bằng 1
            $gio_hang[$product_id] = $quantily;
       }
       //đặt lại vào session gio hang
       session(['cart'=>$gio_hang]);

       //chuyển hướng về trang giỏ hàng hoặc sản phẩm
       return redirect()->route('website.shop.my-cart');
       //return redirect('/san-pham');

    }
    public function post_to_cart(Request $request){

       $quantily = $request->quantily;
       $product_id = $request->productid_hidden;

       $gio_hang = session('cart',[]); 
       if( isset($gio_hang[$product_id]) ){
            $gio_hang[$product_id] += $quantily;
       }else{
            $gio_hang[$product_id] = $quantily;
       }
       session(['cart'=>$gio_hang]);
       return redirect()->route('website.shop.my-cart');
    }
    public function update_cart(Request $request)
    {      
       $so_luongs = $request->so_luong;
       session(['cart'=>$so_luongs]); 
       Session::flash('success', 'Update Successfully');
       return redirect()->route('website.shop.my-cart');
    }
    public function destroy($id)
    {
        
        $gio_hang = session('cart',[]); 
        unset($gio_hang [$id]);
        session(['cart'=>$gio_hang]); 
        return redirect()->route('website.shop.my-cart');
    }
}
