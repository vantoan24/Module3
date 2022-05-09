@extends('layout.admin.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>EDIT PRODUCT</h1>
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
                        <form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h3 class="card-title"><strong>Edit Product</strong></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ $product->name }}"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <select class="form-control" name="category_id">
                                            @foreach($categories as $category)
                                            <option @if($product->category_id == $category->id)
                                                {{"selected"}}
                                                @endif
                                                value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" class="form-control" name="price"
                                            value="{{ $product->price }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" class="form-control" name="image" required>
                                        {{$product->image}}
                                    </div>
                                    <div class="form-group">
                                        <label>Images</label>
                                        <input type="file" class="form-control" name="images[]" required>
                                        
                                        <input type="file" class="form-control" name="images[]" required>                                        
                                
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Describe</label>
                                        <input type="text" class="form-control" name="describe"
                                            value="{{ $product->describe }}" required>
                                    </div>

                                </table>
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button class="btn btn-secondary"
                                    onclick="window.history.go(-1); return false;">Cancel</button>
                            </div>
                        </form>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
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