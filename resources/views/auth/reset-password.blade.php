<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reset Password</title>
@include('includes.style')
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
        <img src="{{ asset('assets/img/logoft.png') }}" alt="logo" width="100px">
    </div>
    <div class="card-body">
      <form  method="POST" action="{{ route('password.store') }}">
        @csrf

         <!-- Password Reset Token -->
         <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="input-group mb-3">
          <input type="email" id="email" name="email" class="form-control @error('email') is invalid
          @enderror" placeholder="Email" value="{{ old('email') ?? $request->email }}" readonly>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @error('email')
        <span class="text-danger"> {{ $message }}</span>
    @enderror
    <div class="input-group mb-3">
        <input type="password" id="password" name="password"
            class="form-control @error('password') is invalid

@enderror"
            placeholder="New Password" require>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>
    @error('password')
        <span class="text-danger"> {{ $message }}</span>
    @enderror
    <div class="input-group mb-3">
        <input type="password" id="password_confirmation" name="password_confirmation"
            class="form-control @error('password_confirmation')

@enderror"
            placeholder="New Password Confirmation" require>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>
    @error('password_confirmation')
        <span class="text-danger"> {{ $message }}</span>
    @enderror
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
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
