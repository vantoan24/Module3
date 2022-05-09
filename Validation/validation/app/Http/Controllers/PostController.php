<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreBlogPost;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost $request){

    }

    public function store2(Request $request){
        $validator = Validator::make(
            $request->all(), 
            [
                'title' => 'required|max:255',
                'body' => 'required',
            ],
            [
                'title.required'=>'Bắt buộc nhập',
                'title.unique' => 'tiêu đề đã bị trùng',
                'title.max' => 'vượt quá giới hạn kí tự',
                'body.required' => 'Bắt buộc nhập'
            ]
        );
 
        if ($validator->fails()) {
            return redirect('post/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        
 

        dd($request->all());
 
        // Store the blog post...
    }
    

    public function store1(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ],
        [
            'title.required'=>'Bắt buộc nhập',
            'title.unique' => 'tiêu đề đã bị trùng',
            'title.max' => 'vượt quá giới hạn kí tự',
            'body.required' => 'Bắt buộc nhập'
        ]
    );

        dd($request->all());
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
