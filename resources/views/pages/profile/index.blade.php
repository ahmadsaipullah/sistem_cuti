@extends('layouts.template_default')
@section('title', 'Halaman Profile')
@section('admin', 'active')
@section('content')
    <div class="content-wrapper">
        @include('sweetalert::alert')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <h1>Halaman Profile</h1>
                    </div>
                    <div class="col-sm-8">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Halaman Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    @if (Auth()->user()->image)
                                        <img src="{{ Storage::url(Auth()->user()->image) }}" alt="gambar"
                                             width="120px" style="width: 120px; height: 120px; object-fit: cover; border-radius: 50%;" class="img-fluid">
                                    @else
                                        <img class="profile-user-img img-fluid img-circle" src="{{ asset('assets/img/user_default.png') }}" alt="User profile picture">
                                    @endif
                                </div>
                                <h3 class="profile-username text-center uppercase">{{ auth()->user()->nama }}</h3>
                                <p class="text-muted text-center">{{ auth()->user()->nik }}</p>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Cuti Tahunan :</b> <a class="float-right">{{ auth()->user()->cuti_th_sisa }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Departemen :</b> <a class="float-right">{{ auth()->user()->dept }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Bagian :</b> <a class="float-right">{{ auth()->user()->bag }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Sesi :</b> <a class="float-right">{{ auth()->user()->seksi }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Email :</b> <a class="float-right">{{ auth()->user()->email }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Nomor Hp :</b> <a class="float-right">{{ auth()->user()->no_hp }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Date Account :</b> <a class="float-right">{{ auth()->user()->created_at->isoformat('DD MMMM Y') }}</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#updatePassword" data-toggle="tab">Update Password</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#updateProfile" data-toggle="tab">Update Profile</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="updatePassword">
                                        <form action="{{ route('profile.updatePassword') }}" method="post" class="form-horizontal">
                                            @csrf
                                            @method('put')
                                            <div class="form-group row">
                                                <label for="current_password" class="col-sm-4 col-form-label">Current password</label>
                                                <div class="col-sm-8">
                                                    <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" placeholder="Current password">
                                                </div>
                                                @error('current_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group row">
                                                <label for="password" class="col-sm-4 col-form-label">New password</label>
                                                <div class="col-sm-8">
                                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="New password">
                                                </div>
                                                @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group row">
                                                <label for="password_confirmation" class="col-sm-4 col-form-label">Password confirmation</label>
                                                <div class="col-sm-8">
                                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Password confirmation">
                                                </div>
                                                @error('password_confirmation')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group row">
                                                <div class="offset-sm-4 col-sm-8">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" required> I agree to the terms and conditions
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-4 col-sm-8">
                                                    <button type="submit" class="btn btn-danger">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="updateProfile">
                                        <form action="{{ route('profile.update', auth()->user()->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            @csrf
                                            @method('put')
                                            <div class="form-group row">
                                                <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') ?? auth()->user()->nama }}">
                                                    @error('nama')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="nik" class="col-sm-4 col-form-label">NIK</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik') ?? auth()->user()->nik }}">
                                                    @error('nik')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="dept" class="col-sm-4 col-form-label">Departemen</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control @error('dept') is-invalid @enderror" id="dept" name="dept" value="{{ old('dept') ?? auth()->user()->dept }}">
                                                    @error('dept')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="bag" class="col-sm-4 col-form-label">Bagian</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control @error('bag') is-invalid @enderror" id="bag" name="bag" value="{{ old('bag') ?? auth()->user()->bag }}">
                                                    @error('bag')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="seksi" class="col-sm-4 col-form-label">Seksi</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control @error('seksi') is-invalid @enderror" id="seksi" name="seksi" value="{{ old('seksi') ?? auth()->user()->seksi }}">
                                                    @error('seksi')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="no_hp" class="col-sm-4 col-form-label">No Handphone</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp') ?? auth()->user()->no_hp }}">
                                                    @error('no_hp')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-4 col-form-label">Email</label>
                                                <div class="col-sm-8">
                                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') ?? auth()->user()->email }}" readonly>
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="image" class="col-sm-4 col-form-label">Image</label>
                                                <div class="col-sm-8">
                                                    @if (auth()->user()->image)
                                                        <img src="{{ Storage::url(auth()->user()->image) }}" alt="gambar" width="120px" style="width: 120px; height: 120px; object-fit: cover; border-radius: 50%;" class="img-fluid">
                                                    @else
                                                        <img alt="image" class="img-fluid tumbnail" src="{{ asset('assets/img/user_default.png') }}" width="100px" class="tumbnail img-fluid">
                                                    @endif
                                                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                                                    @error('image')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-4 col-sm-8">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" required> I agree to the terms and conditions
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-4 col-sm-8">
                                                    <button type="submit" class="btn btn-danger">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
