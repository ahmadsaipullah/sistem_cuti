<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pengajuan Cuti</title>
</head>

<body>

    <style type="text/css">

.header{
    margin: auto;
}


.biodata th{
    text-align:  left;
}
.biodata {
    border-collapse: collapse;
    margin-top: 30px;
}

.biodata .judul{
    text-transform: uppercase;
}

.biodata th,
.biodata td {
    border: 1px solid black;
    padding: 4px; /* Penambahan padding untuk tampilan yang lebih baik */
}

.bimbingan {
    border-collapse: collapse;
    margin-top: 40px;
}

.bimbingan th,
.bimbingan td {
    border: 1px solid black;
    padding: 4px; /* Penambahan padding untuk tampilan yang lebih baik */
}

.ttd{
    margin-top: 150px;

}
.ttd th{
    text-align: right;
}

.ttd thead {
    float: right;
  }

.nama{
    margin-top: 80px;


}
.nama th{
    text-align:center;
}

.container{
    float: right;
}



    </style>
{{-- awal table logo --}}
<table class="header">
<thead>
    <tr>
        <th> <img src="{{ public_path('assets/img/logoft.png') }}" alt="logo" width="150"></th>
        <th><h2>PT UNION FOODS</h2>
            <h4>Jl. Gatot Subroto Km 6.6 No.22, RT.005/RW.002, Jatake, Kec. Jatiuwung, Kota Tangerang, Banten 15136</h4>
        </th>
    </tr>
    <tr>
        <th colspan="4"><hr></th>
    </tr>
</thead>
</table>
{{-- akhir table logo --}}

{{-- table bimbingan --}}
<table class="bimbingan">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Karyawan</th>
            <th>Jenis Cuti</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Jumlah Hari</th>
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
        </tr>
    @empty
        <tr>
            <td colspan="8" class="text-center p-5">Data Kosong</td>
        </tr>
    @endforelse
    </tbody>

</table>
{{-- akhir bimbingan --}}
    {{-- awal ttd --}}
    <div class="container">


    <table class="ttd">
        <thead>
            <tr>
                <th>Tangerang, <?php echo date('d F Y'); ?></th>
            </tr>
            <tr>
              <th>Human Resource Development</th>
            </tr>
        </thead>
    </table>
    {{-- akhir ttd --}}
    <table class="nama">
        <thead>
            <tr>
                <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FIOLITA</th>
              </tr>

        </thead>
    </table>
</div>
</body>

</html>
