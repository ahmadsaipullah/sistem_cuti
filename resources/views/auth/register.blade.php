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
                        <input type="text" id="nik" name="nik"
                            class="form-control @error('nik') is-invalid @enderror" placeholder="NIK"
                            value="{{ old('nik') }}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-id-badge"></span>
                            </div>
                        </div>
                    </div>
                    @error('nik')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="text" id="nama" name="nama"
                            class="form-control @error('nama') is-invalid @enderror" placeholder="Nama"
                            value="{{ old('nama') }}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    @error('nama')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="text" id="dept" name="dept"
                            class="form-control @error('dept') is-invalid @enderror" placeholder="Departemen"
                            value="{{ old('dept') }}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-building"></span>
                            </div>
                        </div>
                    </div>
                    @error('dept')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="text" id="bag" name="bag"
                            class="form-control @error('bag') is-invalid @enderror" placeholder="Bagian"
                            value="{{ old('bag') }}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-building"></span>
                            </div>
                        </div>
                    </div>
                    @error('bag')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="text" id="seksi" name="seksi"
                            class="form-control @error('seksi') is-invalid @enderror" placeholder="Seksi"
                            value="{{ old('seksi') }}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-building"></span>
                            </div>
                        </div>
                    </div>
                    @error('seksi')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="text" id="no_hp" name="no_hp"
                            class="form-control @error('no_hp') is-invalid @enderror" placeholder="Nomor Handphone"
                            value="{{ old('no_hp') }}" required>
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
                            class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                            value="{{ old('email') }}" required>
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
                            class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
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
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            placeholder="Retype password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password_confirmation')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="text" id="image" name="image"
                            class="form-control @error('image') is-invalid @enderror" placeholder="Image (optional)"
                            value="{{ old('image') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-image"></span>
                            </div>
                        </div>
                    </div>
                    @error('image')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="number" id="level_id" name="level_id"
                            class="form-control @error('level_id') is-invalid @enderror" placeholder="Level ID"
                            value="{{ old('level_id') }}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-level-up-alt"></span>
                            </div>
                        </div>
                    </div>
                    @error('level_id')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="number" id="cuti_th_sisa" name="cuti_th_sisa"
                            class="form-control @error('cuti_th_sisa') is-invalid @enderror" placeholder="Cuti TH Sisa"
                            value="{{ old('cuti_th_sisa') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-calendar-alt"></span>
                            </div>
                        </div>
                    </div>
                    @error('cuti_th_sisa')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
                                <label for="agreeTerms">
                                    I agree to the terms
