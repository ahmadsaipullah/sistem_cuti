@extends('layouts.template_default')
@section('title', 'Create Jenis Cuti')
@section('content')
    <div class="content-wrapper">
        <div class="container mt-4">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="text-center">Create Jenis Cuti</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('jeniscuti.store')}}" method="POST">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="nama_cuti">Jenis Cuti</label>
                            <input type="text" class="form-control @error('nama_cuti') is-invalid @enderror"
                                id="nama_cuti" name="nama_cuti" placeholder="nama_cuti" value="{{ old('nama_cuti') }}" required/>
                            @error('nama_cuti')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="default_hari">Default Hari</label>
                            <input type="number" class="form-control @error('default_hari') is-invalid @enderror"
                                id="default_hari" name="default_hari" placeholder="Default Hari" value="{{ old('default_hari') }}" required/>
                            @error('default_hari')
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
