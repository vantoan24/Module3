<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
     // Kiểm tra Session login có tồn tại hay không
    public function ShowBlog(Request $request){
        if($request->session()->has('login') && $request->session()->get('login')){

            // Session login tồn tại và có giá trị là true, chuyển hướng người dùng đến trang blog
            return view('blog');
        }
        // Session không tồn tại, người dùng chưa đăng nhập
        // Gán một thông báo vào Session not-login
        $message = "Bạn chưa đăng nhập";
        $request->session()->flash('not-login', $message);
        return view('blog');
    }
}
