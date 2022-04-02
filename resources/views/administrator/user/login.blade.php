<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{$title}}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/AdminTemplate/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/AdminTemplate/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/AdminTemplate/dist/css/adminlte.css">
  <link rel="shortcut icon" href="/admintemplate/img/logo.png" type="image/x-icon">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline">
      <div class="card-header text-center">
        <img src="/AdminTemplate/img/logo.png" width="30%" alt="">
        <h1>Administrator</h1>
      </div>
      <div class="card-body">
        @include('administrator.alert')
        <form action="/administrator/login/store" method="post">
          <div class="input-group mb-3">
            <input type="email" name="email" required class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" required class="form-control" placeholder="Password">
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
              <button type="submit" class="btn btn-success btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
          <hr>
          <div class="input-group mb-4">
            <p>Đây là trang quản trị <b>"Nông Nghiệp Xanh"</b>, vui lòng không truy cập nếu không có phận sự !</p>

          </div>

          @csrf
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="/AdminTemplate/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="/AdminTemplate/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/AdminTemplate/dist/js/adminlte.min.js"></script>
  <script src="/AdminTemplate/js/removealert.js"></script>

</body>

</html>