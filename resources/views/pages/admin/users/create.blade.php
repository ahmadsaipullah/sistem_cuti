@extends('layouts.template_default')
@section('title', 'Create Admin')
@section('content')
    <div class="content-wrapper">
        <div class="container mt-4">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="text-center">Create Admin</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                id="nik" name="nik" placeholder="NIK" value="{{ old('nik') }}" required/>
                            @error('nik')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                id="nama" name="nama" placeholder="Nama" value="{{ old('nama') }}" required/>
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="dept">Departemen</label>
                            <input type="text" class="form-control @error('dept') is-invalid @enderror"
                                id="dept" name="dept" placeholder="Departemen" value="{{ old('dept') }}" required/>
                            @error('dept')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="bag">Bagian</label>
                            <input type="text" class="form-control @error('bag') is-invalid @enderror"
                                id="bag" name="bag" placeholder="Bagian" value="{{ old('bag') }}" required/>
                            @error('bag')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="seksi">Seksi</label>
                            <input type="text" class="form-control @error('seksi') is-invalid @enderror"
                                id="seksi" name="seksi" placeholder="Seksi" value="{{ old('seksi') }}" required/>
                            @error('seksi')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="no_hp">Nomor Handphone</label>
                            <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                id="no_hp" name="no_hp" placeholder="Nomor Handphone" value="{{ old('no_hp') }}" required/>
                            @error('no_hp')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" name="email" placeholder="Email" value="{{ old('email') }}" required/>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="Password" required/>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                                id="image" name="image"/>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="level_id">Level User</label>
                            <select class="form-control" id="level_id" name="level_id">
                                <option disabled selected>-- Pilih Level User --</option>
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->level }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
