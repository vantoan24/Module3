<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id','desc')->paginate(5);
        return view('admin.order.list', compact('orders'));
    }

    
    public function destroy($id)
    {
        $orders = Order::findOrFail($id);
        $orders->delete;
        Session::flash('success', 'Delete Successfully');
        return redirect()->route('order.index');
    }
}
