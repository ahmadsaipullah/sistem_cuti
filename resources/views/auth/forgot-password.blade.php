<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Forgot Password</title>
@include('includes.style')
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
        <img src="{{ asset('assets/img/logoft.png') }}" alt="logo" width="100px">
    </div>
    <div class="card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
      <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-success" :status="session('status')" />
      <form action="{{ route('password.email') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" id="email" name="email" class="form-control @error('email') is invalid

          @enderror" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @error('email')
        <span class="text-danger"> {{ $message }}</span>
    @enderror
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Request new password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mt-3 mb-1">
        <a href="{{route('login')}}">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

@include('includes.script')
</body>
</html>
