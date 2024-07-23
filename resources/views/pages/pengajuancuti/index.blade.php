@extends('layouts.template_default')
@section('title', 'Halaman Pengajuan Cuti')
@section('pengajuancuti', 'active')
@section('content')
    <div class="content-wrapper">
        @include('sweetalert::alert')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Halaman Pengajuan Cuti</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Halaman Pengajuan Cuti</li>
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
                                            <th>Action</th>
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
                                                <td>
                                                   <div class="d-flex justify-content-around">

                                                    <form action="{{route('rejected', $pengajuan->id)}}" method="post">
                                                        @csrf
                                                        <input name="status" id="status"
                                                            type="hidden" value="ditolak">
                                                        <button class="btn btn-xs  btn-danger"
                                                            type="submit">Rejected</button>
                                                    </form>

                                                    <form action="{{route('approve', $pengajuan->id)}}" method="post">
                                                        @csrf
                                                        <input name="status" id="status"
                                                            type="hidden" value="disetujui">
                                                        <button class="btn btn-xs  btn-success"
                                                            type="submit">Approve</button>
                                                    </form>

                                                   </div>
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
