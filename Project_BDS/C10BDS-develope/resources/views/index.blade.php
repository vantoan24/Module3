@extends('admin.layouts.master')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  
</head>

<body>
  <a class="btn btn-success" href="{{route('branches.index')}}" style="width: 325px; height:100px; color:yellow">
    <h1> <i> Chi Nhánh </i></h1>
  </a>
  <a class="btn btn-success" href="{{route('users.index')}}" style="width: 325px; height:100px; color:yellow">
    <h1> <i> Nhân Viên </i></h1>
  </a>
  <a class="btn btn-success" href="{{route('userGroups.index')}}" style="width: 325px; height:100px; color:yellow">
    <h1> <i> Nhóm nhân viên </i></h1>
  </a>
  <br>
  <br>
  <br>
  <a class="btn btn-success" href="{{route('branches.index')}}" style="width: 325px; height:100px; color:yellow">
    <h1> <i> Sản Phẩm </i></h1>
  </a>
  <a class="btn btn-success" href="{{route('productCategories.index')}}" style="width: 325px; height:100px; color:yellow">
    <h1> <i> Danh mục sản phẩm </i></h1>
  </a>
  <a class="btn btn-success" href="{{route('roles.index')}}" style="width: 325px; height:100px; color:yellow">
    <h1> <i> Vai trò </i></h1>
  </a>
</body>

</html>




@endsection