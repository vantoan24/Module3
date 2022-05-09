@extends('layout.admin.index')
@section('content')



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ADD CATEGORY</h1>
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

                        <form method="post" action="{{ route('category.store') }}">
                            @csrf
                            <div class="card-header">
                                <label>Category Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter name" required>
                            </div>
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Add</button>
                                <button class="btn btn-secondary"
                                    onclick="window.history.go(-1); return false;">Cancel</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
    </section>
    <!-- /.content -->
</div>
@endsection