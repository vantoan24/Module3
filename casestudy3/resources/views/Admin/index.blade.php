@extends('Admin.layout.master')
@section('title','Home')
@section('body')
<div class='card'>
    <div class='card-header'>
        <h1 class="mt-11">Quản lý sản phẩm</h1>
        {{-- @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <form method="get">
            <div class="row">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>Sorry!</strong> invalid input.<br><br>
                    <ul style="list-style-type:none;">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div>
                    <a class="btn btn-success" href="{{ route('products.create') }}">Thêm mới</a>
                </div>
                @if (Session::has('success'))
                <p class="text-success">
                    <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                </p>
                @endif --}}

            </div>
        </form>
    </div>

    <div class='card-body'>
        <div class="row">
            <div class="col-lg-11">
                <div class="container">
                    <table class="table">
                        <thead>
                            <tr style="text-align:center">
                                <th scope="col" >ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Image</th>
                                <th scope="col">Des</th>
                                <th scope="col">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($products as $key => $product)
                            <tr>
                                <td>{{ $product->id}}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <!-- <td><img style="height:80px;" src="{{ asset('upload/'. $product->image)}}" alt=""></td> -->
                                <td><img style="height:80px;" src="{{$product->image}}" alt=""></td>
                                <td style=" height: 100px;">{{ $product->des }}</td>
                                <td>
                                    <a href="{{route('products.edit',[$product->id])}}" class="btn btn-primary" >Edit</a>
                                    </td>
                                    <td>
                                    <form action="{{route('products.destroy',[$product->id])}}" method="POST" style="display:flex">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Bạn muốn xóa sản phẩm này không?');" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach --}}

                        </tbody>
                    </table>
                </div>
                <div class=" d-flex justify-content-end">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

            