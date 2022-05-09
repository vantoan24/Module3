<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Product_img;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
session_start();

class ProductController extends Controller
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
        $products = Product::orderBy('id','desc')->paginate(5);
        return view('admin.product.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        
        return view('admin.product.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->describe = $request->describe;
        $product->category_id = $request->category_id;

        $file = $request->image;

        if ($request->hasFile('image')) {
            $file = $request->image;
            $path = $file->store('image','public');
            $product->image = $path;
        }
        $product->save();

        $product_id = $product->id;
        $images = $request->file('images');
        if($images != null) {
            foreach($images as $image){
                if(isset($image)){
                    $product_imgs = new Product_img();
                    $path = $image->store('images', 'public');
                    $product_imgs->images = $path;
                    $product_imgs->product_id = $product_id;
                    $product_imgs->save();
                }
            }
        }

        $message = "Add $request->name Successfully!";
        Session::flash('create-success', $message);
        return redirect()->route('product.index', compact('message'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name     = $request->input('name');
        $product->price    = $request->input('price');
        $product->describe    = $request->input('describe'); 
        $product->category_id  = $request->input('category_id');

        if ($request->hasFile('image')) {
            //xoa anh cu neu co
            $currentFile = $product->image;
            if ($currentFile) {
                Storage::delete('/public/' . $currentFile);
            }
            
            $file = $request->image;
            $path = $file->store('image', 'public');
            $product->image = $path;
        }

        $product->save();
        
        if($request->hasFile('images')) {
            $images = $request->file('images');
            foreach($images as $image){
                if(isset($image)){
                    $product_imgs = new Product_img();
                    $path = $image->store('images', 'public');
                    $product_imgs->images = $path;
                    $product_imgs->product_id = $id;
                    $product_imgs->save();
                }
            }
        }

        //dung session de dua ra thong bao
        Session::flash('success', 'Update Successfully');
   
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product_imgs = Product_img::where('product_id', $id)->get();
        foreach ($product_imgs as $product_img) {
            $product_image_del = $product_img->image;
            if ($product_image_del) {
                Storage::delete('/public/' . $product_image_del);
            }
            $product_img->delete();
        }
        $image = $product->image;
        if ($image) {
            Storage::delete('/public/' . $image);
        }
        $product->delete();

        Session::flash('success', 'Delete Successfully');
        //xoa xong quay ve trang danh sach khach hang
        return redirect()->route('product.index');
    }
    public function AuthLogin(){
        $id = Session::get('id');
        if($id){
            return Redirect::to('admin.dashboard');
        }else{
            return Redirect::to('admin.login')->send();
        }
    }
    public function search(Request $request){
        $product = Product::where('name','like', "%$request->search%")->first();
        return view('admin.product.list_search', compact('product'));
    }
}