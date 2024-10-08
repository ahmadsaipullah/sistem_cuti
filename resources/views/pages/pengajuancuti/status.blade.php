@extends('layouts.template_default')
@section('title', 'Halaman Status Cuti')
@section('status', 'active')
@section('content')
    <div class="content-wrapper">
        @include('sweetalert::alert')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Halaman Status Cuti</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Halaman Status Cuti</li>
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
                            {{-- <div class="card-header">
                                <a class="btn btn-primary" href="#"><i class="fa fa-plus"></i> Ajukan Cuti</a>
                            </div> --}}
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="Table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Karyawan</th>
                                            <th>Jenis Cuti</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Selesai</th>
                                            <th>Jumlah Hari</th>
                                            <th>Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pengajuancutis as $pengajuan)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $pengajuan->User->nama }}</td>
                                                <td>{{ $pengajuan->jenisCuti->nama_cuti }}</td>
                                                <td>{{ \Carbon\Carbon::parse($pengajuan->tanggal_mulai)->format('d F Y') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($pengajuan->tanggal_selesai)->format('d F Y') }}</td>
                                                <td>{{ $pengajuan->jumlah_hari }}</td>
                                                <td>
                                                    @if( $pengajuan->status == 'diajukan' )
                                                    <span class="badge badge-warning">Diajukan</span>
                                                    @elseif( $pengajuan->status == 'disetujui' )
                                                    <span class="badge badge-success">Disetujui</span>
                                                    @elseif( $pengajuan->status == 'ditolak' )
                                                    <span class="badge badge-danger">Ditolak</span>
                                                    @endif
                                                </td>

                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center p-5">Data Kosong</td>
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
