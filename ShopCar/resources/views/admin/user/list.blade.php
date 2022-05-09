@extends('layout.admin.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>CATEGORY</h1>
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
                            <h3 class="card-title"><strong>Category List</strong></h3>

                        </div>
                        <div class="card-header">
                            @if(Session::has('success'))
                            <span style="color: green">{{ Session::get('success') }}</span>
                            @endif
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Category</th>
                                        <th scope="col" colspan="2">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $key => $category)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $category->name }}</td>
                                        <td><a href="{{ route('category.edit', $category->id) }}" method="GET">
                                                <button class="btn btn-warning">Edit</button>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger"
                                                    onclick="return confirm('Are you sure to delete?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>

                            </table>
                            <a class="btn btn-primary" href="{{ route('category.create') }}">Thêm mới</a>
                        </div>
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