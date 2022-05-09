@extends('layout.admin.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>PRODUCT</h1>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Product List</strong></h3>

                        </div>
                        <div  class="card-header">
                        <a class="btn btn-primary" href="{{ route('product.create') }}">Thêm mới</a>
                        </div>
                        <div class="card-header">
                            @if(Session::has('success'))
                            <span style="color: green">{{ Session::get('success') }}</span>
                            @endif
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Price</th>
                                        <th scope="col" colspan="2">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $key => $product)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>@if($product->image)
                                            <img src="{{ Storage::url($product->image) }}" alt=""
                                                style="width: 100px; height: 100px">
                                            @else
                                            {{'Chưa có ảnh'}}
                                            @endif
                                        </td>
                                        <td>{{ $product->name }}</td>

                                        <td>{{ $product->danh_muc->name }}</td>

                                        <td>{{ number_format($product->price) }} đ</td>
                                        <td><a href="{{ route('product.edit', $product->id) }}" method="GET">
                                                <button class="btn btn-warning">Edit</button>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"
                                                    onclick="return confirm('Are you sure to delete?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>

                            </table>
                            
                            </div>
                        </div>
                        <!-- /.card-body -->
                        
                    </div>
                    <!-- /.card -->
                    <div aria-label="Page navigation">
                        {{ $products->links() }}
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection