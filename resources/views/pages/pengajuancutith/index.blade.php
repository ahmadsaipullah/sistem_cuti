@extends('layouts.template_default')
@section('title', 'Halaman Pengajuan Cuti Tahunan')
@section('pengajuancutith', 'active')
@section('content')
    <div class="content-wrapper">
        @include('sweetalert::alert')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Halaman Pengajuan Cuti Tahunan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Halaman Pengajuan Cuti Tahunan</li>
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
                                <a class="btn btn-danger" href="{{ route('cutith.pdf') }}"><i class="fa fa-file-pdf"></i> Export PDF</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="Table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Karyawan</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Selesai</th>
                                            <th>Jumlah Hari</th>
                                            <th>Sisa Cuti Tahunan</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pengajuancutiths as $pengajuan)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $pengajuan->User->nama }}</td>
                                                <td>{{ \Carbon\Carbon::parse($pengajuan->tanggal_mulai)->format('d F Y') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($pengajuan->tanggal_selesai)->format('d F Y') }}</td>
                                                <td>{{ $pengajuan->jumlah_hari }}</td>
                                                <td>{{ $pengajuan->User->cuti_th_sisa }} Hari</td>
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

                                                    <form action="{{route('rejected.th', $pengajuan->id)}}" method="post">
                                                        @csrf
                                                        <input name="status" id="status"
                                                            type="hidden" value="ditolak">
                                                        <button class="btn btn-xs  btn-danger"
                                                            type="submit">Rejected</button>
                                                    </form>

                                                    <form action="{{route('approve.th', $pengajuan->id)}}" method="post">
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
