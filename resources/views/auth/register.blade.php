<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>

    @include('includes.style')

</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <img src="{{ asset('assets/img/logoft.png') }}" alt="logo" width="100px">
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register a new account</p>
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" id="name" name="name"
                            class="form-control @error('name') is invalid @enderror" placeholder="Nama Lengkap"
                            value="{{ old('name') }}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    @error('name')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="text" id="nopol" name="nopol"
                            class="form-control @error('nopol') is invalid

          @enderror"
                            placeholder="Nomor Polisi" value="{{ old('nopol') }}" require>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-tools"></span>
                            </div>
                        </div>
                    </div>
                    @error('nopol')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="text" id="no_rangka" name="no_rangka"
                            class="form-control @error('no_rangka') is invalid

          @enderror"
                            placeholder="Nomor Rangka" value="{{ old('no_rangka') }}" require>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-tools"></span>
                            </div>
                        </div>
                    </div>
                    @error('no_rangka')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="number" id="no_hp" name="no_hp"
                            class="form-control @error('no_hp') is invalid

          @enderror"
                            placeholder="Nomor Handphone" value="{{ old('no_hp') }}" require>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>
                    @error('no_hp')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="email" id="email" name="email"
                            class="form-control @error('email') is invalid

          @enderror" placeholder="Email"
                            value="{{ old('email') }}" require>
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
                        <input type="text" id="tipe_mobil" name="tipe_mobil"
                            class="form-control @error('tipe_mobil') is invalid

          @enderror" placeholder="Type Mobil"
                            value="{{ old('tipe_mobil') }}" require>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-tools"></span>
                            </div>
                        </div>
                    </div>
                    @error('tipe_mobil')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="text" id="alamat" name="alamat"
                            class="form-control @error('alamat') is invalid

          @enderror" placeholder="Alamat"
                            value="{{ old('alamat') }}" require>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('alamat')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror


                    <div class="input-group mb-3">
                        <input type="password" id="password" name="password"
                            class="form-control @error('password') is invalid

          @enderror"
                            placeholder="Password" require>
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
                            placeholder="Retype password" require>
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
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
                                <label for="agreeTerms">
                                    I agree to the terms
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <a href="{{ route('login') }}" class="text-center">I already have a account</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    @include('includes.script')
</body>

</html>
