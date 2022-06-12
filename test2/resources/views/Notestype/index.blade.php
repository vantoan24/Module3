@extends('Layout.master')
@section('body')
<div class="container">
    <br><br><br>
    <h1 style="text-align:center">Ghi Chú</h1>
    <br>
    <form method="POST" action="index.php?controller=Notetype&action=search">
                <div class="row mt-5 justify-content-end">
                    <div class="col-md-2">
                        <a href="" class="btn btn-dark" style="width: 100%">Thêm mới</a>
                    </div>
                    <div>
                    </div>
                    <div class="col-md-8">
                        <input class="form-control" type="text" placeholder="Tên" name="search">
                    </div>
                    <div class="col-md-2">
                        <input type="submit" value="Tìm kiếm" class="form-control btn btn-dark">
                    </div>
                </div>
            </form>
     <table class="table table-boder" border="1">
        <thead>
            <tr>
            <td style="text-align:center"><b>STT
                <a href="">
                <i class="fa fa-fw fa-sort text-secondary"></i>
                </b></td>
                <td style="text-align:center"><b>Tên
                <a href="">
                <i class="fa fa-fw fa-sort text-secondary"></i>
                </b></td>
                <td style="text-align:center"><b>Mô tả
                <a href="">
                <i class="fa fa-fw fa-sort text-secondary"></i>
                </b></td>
                <td colspan="4" style="text-align:center"><b>Chức năng</b></td>

            </tr>
        <tbody>
        </tbody>
        </thead>
    </table>
    <div>
    <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item">
      <a class="page-link" href="" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
    </div>

</div>
@endsection
