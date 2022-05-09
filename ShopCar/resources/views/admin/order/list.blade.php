@extends('layout.admin.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ORDER</h1>
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
                            <h3 class="card-title"><strong>Order List</strong></h3>

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
                                        <th scope="col">Customer</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Email</th>
                                        <th scope="col" colspan="2">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $key => $order)  
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $order->user_name }}</td>
                                        <td>{{ $order->user_phone }}</td>
                                        <td>{{ $order->address }}</td>
                                        <td>{{ $order->email }}</td>

                                        <td><a href="" method="GET">
                                                <button class="btn btn-warning">See</button>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{route('order.destroy', $order->id) }}" method="POST">
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
                <div aria-label="pagination justify-content-center mt-4">
                        {{ $orders->links() }}
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