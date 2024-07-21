@extends('layouts.template_default')
@section('title', 'Halaman Jenis Cuti')
@section('jeniscuti','active')
@section('content')
    <div class="content-wrapper">
        @include('sweetalert::alert')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Halaman Jenis Cuti</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Halaman Jenis Cuti</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a class="btn btn-primary" href="{{ route('jeniscuti.create') }}"><i class="fa fa-plus"></i> Tambah Jenis Cuti</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="Table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Cuti</th>
                                            <th>Default Hari</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($jeniscutis as $jeniscuti)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $jeniscuti->nama_cuti }}</td>
                                                <td>{{ $jeniscuti->default_hari }} Hari</td>
                                                <td>
                                                    <div class="text-center d-flex">
                                                        <a href="{{ route('jeniscuti.edit', $jeniscuti->id) }}" class="btn btn-warning btn-sm">
                                                            <i class="fa fa-pen"></i>
                                                        </a>
                                                        <form action="{{ route('jeniscuti.destroy', $jeniscuti->id) }}" method="post" class="d-inline">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger btn-sm delete_confirm" type="submit">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="11" class="text-center p-5">Data Kosong</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
