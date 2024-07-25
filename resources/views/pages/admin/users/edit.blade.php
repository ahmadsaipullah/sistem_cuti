@extends('layouts.template_default')
@section('title', 'Update Admin')
@section('content')
    <div class="content-wrapper">
        <div class="container mt-4">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="text-center">Update Admin</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                id="nik" name="nik" placeholder="NIK" value="{{ old('nik', $admin->nik) }}" required/>
                            @error('nik')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                id="nama" name="nama" placeholder="Nama" value="{{ old('nama', $admin->nama) }}" required/>
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="dept">Departemen</label>
                            <input type="text" class="form-control @error('dept') is-invalid @enderror"
                                id="dept" name="dept" placeholder="Departemen" value="{{ old('dept', $admin->dept) }}" required/>
                            @error('dept')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="bag">Bagian</label>
                            <input type="text" class="form-control @error('bag') is-invalid @enderror"
                                id="bag" name="bag" placeholder="Bagian" value="{{ old('bag', $admin->bag) }}" required/>
                            @error('bag')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="seksi">Seksi</label>
                            <input type="text" class="form-control @error('seksi') is-invalid @enderror"
                                id="seksi" name="seksi" placeholder="Seksi" value="{{ old('seksi', $admin->seksi) }}" required/>
                            @error('seksi')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="no_hp">Nomor Handphone</label>
                            <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                id="no_hp" name="no_hp" placeholder="Nomor Handphone" value="{{ old('no_hp', $admin->no_hp) }}" required/>
                            @error('no_hp')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" name="email" placeholder="Email" value="{{ old('email', $admin->email) }}" required/>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="Password" value="{{ old('password', $admin->password) }}" />
                            <small class="form-text text-muted">Leave blank to keep the current password</small>
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
                                    <option value="{{ $level->id }}" {{ $admin->level_id == $level->id ? 'selected' : '' }}>{{ $level->level }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="cuti_th_sisa">Sisa Cuti Tahunan</label>
                            <input type="number" class="form-control @error('cuti_th_sisa') is-invalid @enderror"
                                id="cuti_th_sisa" name="cuti_th_sisa" placeholder="Sisa Cuti Tahunan" value="{{ old('cuti_th_sisa', $admin->cuti_th_sisa) }}" required/>
                            @error('cuti_th_sisa')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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
