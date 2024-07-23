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
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('pengajuancuti.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="jenis_cuti_id">Jenis Cuti:</label>
                                        <select name="jenis_cuti_id" id="jenis_cuti_id" class="form-control">
                                            <option disabled selected>--Pilih Cuti--</option>
                                            @foreach ($jenisCuti as $cuti)
                                                <option value="{{ $cuti->id }}" data-default-hari="{{ $cuti->default_hari }}">{{ $cuti->nama_cuti }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah_hari">Jumlah Hari:</label>
                                        <input type="number" name="jumlah_hari" id="jumlah_hari" class="form-control" min="1" max="12" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_mulai">Tanggal Mulai:</label>
                                        <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_selesai">Tanggal Selesai:</label>
                                        <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan:</label>
                                        <textarea name="keterangan" id="summernote" class="form-control summernote"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Ajukan Cuti</button>
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
            const jenisCutiSelect = document.getElementById('jenis_cuti_id');
            const jumlahHariInput = document.getElementById('jumlah_hari');

            jenisCutiSelect.addEventListener('change', function () {
                const selectedOption = jenisCutiSelect.options[jenisCutiSelect.selectedIndex];
                const defaultHari = selectedOption.getAttribute('data-default-hari');

                if (defaultHari) {
                    jumlahHariInput.value = defaultHari;
                } else {
                    jumlahHariInput.value = '';
                }
            });
        });
    </script>
@endsection
