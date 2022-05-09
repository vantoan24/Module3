@extends('home')
@section('title', 'Thêm mới nhân viên')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Thêm mới Nhân Viên</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{ route('customers.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Mã Nhân Viên</label>
                        <input type="text" class="form-control" name="employeecode" placeholder="" >
                        @if ($errors->any())
                                    <p style="color:red">{{ $errors->first('employeecode') }}</p>
                                @endif
                    </div>
                    <div class="form-group">
                        Chọn Nhóm Nhân Viên
                        <select class="form-control" name="staffgroup">                            
                            <option value="Quản trị hệ thống">Quản trị hệ thống</option>
                            <option value="Quản lý nhân sự">Quản lý nhân sự</option>
                            <option value="Lễ tân">Lễ tân</option>
                            <option value="Quản lý phòng">Quản lý phòng</option>
                            <option value="Quản lý dịch vụ">Quản lý dịch vụ</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Họ Tên</label>
                        <input type="text" class="form-control" name="fullname" >
                        @if ($errors->any())
                                    <p style="color:red">{{ $errors->first('fullname') }}</p>
                         @endif
                    </div>
                    <div class="form-group">
                        <label>Ngày Sinh</label>
                        <input type="date" class="form-control" name="Dateofbirth" >
                        @if ($errors->any())
                                    <p style="color:red">{{ $errors->first('Dateofbirth') }}</p>
                         @endif
                    </div>
                    <div class="form-group">
                        <label>Giới Tính</label>
                        <input type="radio" id="gender" name="gender" value="Nam"> Nam
                        <input type="radio" id="gender" name="gender" value="Nữ"> Nữ
                        @if ($errors->any())
                            <p style="color:red">{{ $errors->first('gender') }}</p>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label>Số Điện Thoại</label>
                        <input type="text" class="form-control" name="phone" >
                        @if ($errors->any())
                            <p style="color:red">{{ $errors->first('phone') }}</p>
                         @endif
                    </div>
                    <div class="form-group">
                        <label>Số CMND</label>
                        <input type="text" class="form-control" name="CMND" >
                        @if ($errors->any())
                            <p style="color:red">{{ $errors->first('CMND') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="emai" class="form-control" name="email" required>
                        @if ($errors->any())
                            <p style="color:red">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Địa Chỉ</label>
                        <input type="text" class="form-control" name="address">
                        @if ($errors->any())
                            <p style="color:red">{{ $errors->first('address') }}</p>
                        @endif
                    </div>                  
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                </form>
            </div>
        </div>
    </div>
@endsection