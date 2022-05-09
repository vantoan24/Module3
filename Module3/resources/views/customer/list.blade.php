@extends('home')
@section('title', 'Danh sách nhân viên')

@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h1>Danh Sách Nhân Viên</h1>
            </div>
            <div class="col-12">

                <div class="row">
                    <div class="col-6">                   
                        <br>
                        @if (Session::has('success'))
                            <p class="text-success">
                                <i class="fa fa-check" aria-hidden="true"></i>
                                {{ Session::get('success') }}
                            </p>
                        @endif

                        {{-- @if(isset($totalCustomerFilter))
                            <span class="text-muted">
                      {{'Tìm thấy' . ' ' . $totalCustomerFilter . ' '. 'khách hàng:'}}
                  </span>
                        @endif --}}

                    </div>
                    <div class="col-6">
                        <div class="col-6">
                            <a class="btn btn-primary" href="{{ route('customers.create') }}">Thêm mới</a>
                        </div>
                        <form class="navbar-form navbar-left" action="{{ route('customers.search') }}" method="get">
                            @csrf
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="keyword" placeholder="Search" value="{{ (isset($_GET['keyword'])) ? $_GET['keyword'] : '' }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-default">Tìm kiếm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Mã Nhân Viên</th>
                    <th scope="col">Nhóm Nhân Viên</th>
                    <th scope="col">Họ Tên</th>
                    <th scope="col">Giới Tính</th>
                    <th scope="col">SĐT</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($customers) == 0)
                    <tr>
                        <td colspan="7" class="text-center">Không có dữ liệu</td>
                    </tr>
                @else
                    @foreach($customers as $key => $customer)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $customer->staffgroup }}</td>
                            <td>{{ $customer->fullname }}</td>
                            <td>{{ $customer->gender }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td><a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning">sửa</a></td>
                            <td>
                                <form action="{{route('customers.destroy',[$customer->id])}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button onclick="return confirm('Bạn muốn xóa sản phẩm này không?');" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            {{$customers->links()}}
            <div class="col-12">
                <div class="row">
                    
                    <div class="col-6">
                        <div class="pagination float-right">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="cityModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
            </div>
        </div>
    </div>
@endsection