
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin NC | Log In</title>
  <link rel="icon" href="{{ url('/') }}/images/logo/logo_01_1x.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('/admin') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ url('/admin') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('/admin') }}/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page" >
<div class="login-box">
  <div class="login-logo">
    <a href="{{ route('login') }}"><b>Admin</b> Neon Cart.</a>
  </div>
  <!-- @if (count($errors) > 0)
         <ul>
             @foreach($errors->all() as $error)
                 <li class="text-danger"> {{ $error }}</li>
             @endforeach
         </ul>
     @endif -->

     
  <!-- /.login-logo -->
  <div class="card">
  
    <div class="card-body login-card-body">
      <p class="login-box-msg" ><h2 style="text-align: center;"><strong>Sign In</strong></h2></p>
      @if (session('fail-login'))
         <ul>
             <li class="text-danger"> {{ session('fail-login') }}</li>
         </ul>
     @endif
      <form action="{{ route('postLogin') }}" method="post">
      @csrf
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            
          </div>
          <!-- /.col -->
        </div>
      

      <div class="social-auth-links text-center mb-3">
      <button type="submit" class="btn btn-primary btn-block">Sign In</button>
      <hr>
        <hr>
        
        <a href="{{ route('website.home.index') }}" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Go To Website++
        </a>
      </div>
      <!-- /.social-auth-links -->
      </form>
      <p class="mb-1">
        <a href="https://id.funtap.vn/password/reset">Forgot password ?</a>
      </p>
      
    </div>
    <!-- /.login-card-body -->
   
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ url('/admin') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('/admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ url('/admin') }}/dist/js/adminlte.min.js"></script>
</body>
</html>



<!-- php artisan db:seed --class=Seedername -->