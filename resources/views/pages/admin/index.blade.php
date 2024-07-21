@extends('layouts.template_default')
@section('title', 'Halaman Dosen')
@section('dosen', 'active')
@section('content')
    <div class="content-wrapper">
        @include('sweetalert::alert')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Halaman Dosen</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Halaman Dosen</li>
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
                                <a class="btn btn-primary" href="{{ route('dosen.create') }}"><i class="fa fa-plus"></i>
                                    Tambah Dosen</a>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nidn</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No Hp</th>
                                            {{-- <th>Terpilih SKRIPSI</th>
                                            <th>Kuota SKRIPSI</th>
                                            <th>Terpilih KP</th>
                                            <th>Kuota KP</th> --}}
                                            {{-- <th>Author</th> --}}
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($dosens as $dosen)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $dosen->nidn }}</td>
                                                <td>{{ $dosen->name }}</td>
                                                <td>{{ $dosen->email }}</td>
                                                <td>{{ $dosen->no_hp }}</td>
                                                {{-- <td><span class="btn btn-xs btn-success">{{ $dosen->approval_skripsi }}&nbsp;Mahasiswa</span></td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <form action="{{ route('kurangKuota.skripsi', $dosen->id) }}" method="post">
                                                            @csrf
                                                            @method('put')
                                                            <button type="submit" class="btn btn-xs btn-danger">-</button>
                                                        </form>
                                                        <span class="btn btn-sm btn-transpart">{{ $dosen->kuota_skripsi }}</span>
                                                        <form action="{{ route('tambahKuota.skripsi', $dosen->id) }}" method="post">
                                                            @csrf
                                                            @method('put')
                                                            <button type="submit" class="btn btn-xs btn-success ">+</button>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td><span class="btn btn-xs btn-warning">{{ $dosen->approval_kp }}&nbsp;Mahasiswa</span></td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <form
                                                            action="{{ route('kurangKuota.kp',  $dosen->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('put')
                                                            <button type="submit" class="btn btn-xs btn-danger">-</button>
                                                        </form>
                                                        <span
                                                            class="btn btn-sm btn-transpart">{{ $dosen->kuota_kp }}</span>
                                                        <form
                                                            action="{{ route('tambahKuota.kp',  $dosen->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('put')
                                                            <button type="submit" class="btn btn-xs btn-success">+</button>
                                                        </form>

                                                    </div>

                                                </td>
                                                <td>{{ $dosen->User->name }}</td> --}}
                                                <td>

                                                    <div class="text-center d-flex justify-content-between">
                                                        <a href="{{ route('dosen.show', $dosen->id) }}"
                                                            class="btn btn-primary btn-sm">
                                                            <i class="fa fa-exclamation-triangle "></i>
                                                        </a>
                                                        <a href="{{ route('dosen.edit', $dosen->id) }}"
                                                            class="btn btn-warning btn-sm">
                                                            <i class="fa fa-pen"></i>
                                                        </a>
                                                        <form action="{{ route('dosen.destroy', $dosen->id) }}"
                                                            method="post" class="d-inline">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger btn-sm delete_confirm"
                                                                type="submit">
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
