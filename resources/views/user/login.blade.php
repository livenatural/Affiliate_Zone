<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Affiliate Zone | Log in</title>
  <link rel="icon" href="{{ asset('/assets/dist/img/AdminLTELogo.png') }}" type="image/png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/assets/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/dist/css/style.v1.css') }}">
</head>
<body class="hold-transition login-page">
<div class="top-owner-bar">
  <a href="/owner/login" type="button" class="btn btn-outline-primary">Owner</a>
</div>
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="/" class="h1"><b>User</b></a>
    </div>
    <div class="card-body">
      <form action="/login" method="post">
        @csrf
        @if (session()->has('login_blocked'))
          <div class="input-group mb-3">
            <Button class="btn btn-danger btn-block">Account Blocked</Button>
          </div>
        @endif
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
          <label class="form-check-label" for="flexCheckChecked">
            I agree with <a href="#">Terms</a> & <a href="#">Conditions</a>
          </label>
        </div>
        <div class="social-auth-links text-center mt-2 mb-3">
          <Button type="submit" class="btn btn-block btn-primary">
             Continue
          </Button>
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('/assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/assets/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
