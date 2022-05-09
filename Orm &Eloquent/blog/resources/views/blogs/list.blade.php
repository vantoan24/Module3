@extends('home')
@section('title', 'Danh sách bài viết')

@section('content')
<div class="col-12">
    <div class="row">
        <div class="col-12"><h1>Danh Sách bài viết</h1></div>
        <div class="col-12">
            @if (Session::has('success'))
                <p class="text-success">
                    <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                </p>
            @endif
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Ngày tạo</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if(count($blogs) == 0)
                <tr><td colspan="4">Không có dữ liệu</td></tr>
            @else
                @foreach($blogs as $key => $blog)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->content }}</td>
                        <td>{{ $blog->dob }}</td>
                        <td><a href="{{ route('blogs.edit', $blog->id) }}">sửa</a></td>
                        <td><a href="{{ route('blogs.destroy', $blog->id) }}" class="text-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <a class="btn btn-primary" href="{{ route('blogs.create') }}">Thêm mới</a>
    </div>
</div>
@endsection