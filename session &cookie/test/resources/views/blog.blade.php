@extends('layouts.master')
@section('content')
    <div class="title m-b-md">
        Chào mừng đến với thế giới của anh
    </div>
    <a href="{{ route('user.login') }}">
        <button type="button" class="btn btn-outline-primary">Đăng Xuất</button>
    </a>
    <hr>
@endsection