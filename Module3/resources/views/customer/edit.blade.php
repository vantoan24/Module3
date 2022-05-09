@extends('home')
@section('title', 'Chỉnh sửa khách hàng')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Chỉnh sửa khách hàng</h1>
            </div>
            <div class="col-12">
                <form method="POST" action="{{ route('customers.update', $customer->id) }}">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label>Mã Nhân Viên</label>
                        <input type="text" class="form-control" name="employeecode" value="{{$customer->employeecode}}" required>
                    </div>
                    <div class="form-group">
                        Chọn Nhóm Nhân Viên
                        <select class="form-control" name="staffgroup">                            
                                <option value="{{$customer->staffgroup}}">Lễ Tân</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Họ Tên</label>
                        <input type="text" class="form-control" name="fullname" value="{{$customer->fullname}}" required>
                    </div>
                    <div class="form-group">
                        <label>Ngày Sinh</label>
                        <input type="date" class="form-control" name="Dateofbirth" value="{{$customer->Dateofbirth}}" required>
                    </div>
                    <div class="form-group">
                        <label>Giới Tính</label>
                        <input type="radio" id="gender" name="gender" value="Nam">Nam
                        <input type="radio" id="gender" name="gender" value="Nữ">Nữ
                    </div>
                    <div class="form-group">
                        <label>Số Điện Thoại</label>
                        <input type="text" class="form-control" name="phone"  value="{{$customer->phone}}" required>
                    </div>
                    <div class="form-group">
                        <label>Số CMND</label>
                        <input type="text" class="form-control" name="CMND"  value="{{$customer->CMND}}" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="{{$customer->email}}" required>
                    </div>
                    <div class="form-group">
                        <label>Địa Chỉ</label>
                        <input type="text" class="form-control" name="address" value="{{$customer->address}}" required>
                    </div>                  
                    <button type="submit" class="btn btn-primary">Cập Nhật</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                </form>
            </div>
        </div>
    </div>
@endsection