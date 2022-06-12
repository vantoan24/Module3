<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        $word = $request->word;
        $arr = [
            "hello" => "xin chào",
            "bye"   => "tạm biệt"
        ];
        if (isset($arr[$word])) {
            $kq =  $arr[$word];
        } else {
            $kq = 'Không tìm thấy ' .  $word;
        }
        $params = [
            'kq' => $kq
        ];
        
        return view('future',$params);
    }
    public function match(Request $request){
        $productDescription = $request->description;
        $listPrice = $request->List;
        $discountPercent = $request->percent;
        $discountAmount = $listPrice * $discountPercent * 0.01;
        $discountPrice = $listPrice * $discountAmount;

        return view('show_discount_amount', compact('productDescription', 'listPrice', 'discountPercent', 'discountAmount', 'discountPrice'));
    }
}
