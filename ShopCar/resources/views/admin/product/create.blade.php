@extends('layout.admin.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ADD PRODUCT</h1>
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
                        <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <label>Product Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter name" required>
                            </div>
                            <div class="card-header">
                                <label>Price</label>
                                <input type="text" class="form-control" name="price" placeholder="Enter price" required>
                            </div>
                            <div class="card-header">
                                <label>Category</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="card-header">
                                <label>Image</label>
                                <input type="file" class="form-control" name="image" required>

                            </div>
                            <div class="card-header">
                                <label for="exampleInputFile">Images</label>

                                <input type="file" class="form-control" id="exampleInputFile" name="images[]">
                                <input type="file" class="form-control" id="exampleInputFile" name="images[]">
                            </div>
                            <div class="card-header">
                                <label>Describe</label>
                                <textarea type="text" class="form-control" name="describe" placeholder="Enter describe"
                                    required> </textarea>
                            </div>
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Add</button>
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