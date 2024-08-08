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
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('pengajuancutith.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="tanggal_mulai">Tanggal Mulai:</label>
                                        <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_selesai">Tanggal Selesai:</label>
                                        <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah_hari">Jumlah Hari:</label>
                                        <input type="number" name="jumlah_hari" id="jumlah_hari" class="form-control" min="1" max="12" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan:</label>
                                        <textarea name="keterangan" id="summernote" class="form-control summernote"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Ajukan Cuti Tahunan</button>
                                </form>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tanggalMulai = document.getElementById('tanggal_mulai');
            const tanggalSelesai = document.getElementById('tanggal_selesai');
            const jumlahHari = document.getElementById('jumlah_hari');

            function calculateDays() {
                const startDate = new Date(tanggalMulai.value);
                const endDate = new Date(tanggalSelesai.value);

                if (startDate && endDate && endDate >= startDate) {
                    const timeDifference = endDate - startDate;
                    const dayDifference = timeDifference / (1000 * 3600 * 24) + 1; // Include both start and end date
                    jumlahHari.value = dayDifference;
                } else {
                    jumlahHari.value = '';
                }
            }

            tanggalMulai.addEventListener('change', calculateDays);
            tanggalSelesai.addEventListener('change', calculateDays);
        });
    </script>
@endsection
