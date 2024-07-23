<?php

namespace App\Http\Controllers;

use App\Models\JenisCuti;
use Illuminate\Http\Request;
use App\Models\PengajuanCuti;
use Illuminate\Support\Facades\Auth;

class PengajuanCutiController extends Controller
{

    public function index()
    {
        $pengajuancutis = PengajuanCuti::all();
        return view('pages.pengajuancuti.index', compact('pengajuancutis'));
    }

    public function create()
    {
        $jenisCuti = JenisCuti::all();
        return view('pages.pengajuancuti.create', compact('jenisCuti'));
    }

    public function store(Request $request)
{
    $user = Auth::user();

    $request->validate([

        'jenis_cuti_id' => 'required|exists:jenis_cutis,id',
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'required|date',
        'jumlah_hari' => 'required|integer|min:1',

    ]);

    $jenisCuti = JenisCuti::find($request->jenis_cuti_id);
    $jumlah_hari = $request->jumlah_hari;

    if ($jenisCuti->nama_cuti == 'cuti_th') {
        toast('Gunakan form khusus untuk pengajuan cuti tahunan', 'error');
        return back();
    } else {
        $jumlah_hari = $jenisCuti->default_hari;
    }

   $data = PengajuanCuti::create([
        'user_id' => $user->id,
        'jenis_cuti_id' => $request->jenis_cuti_id,
        'tanggal_mulai' => $request->tanggal_mulai,
        'tanggal_selesai' => $request->tanggal_selesai,
        'jumlah_hari' => $jumlah_hari,
        'status' => 'diajukan',
        'keterangan' => $request->keterangan,
    ]);

    if ($data) {
        toast('Pengajuan Berhasil', 'success');
    } else {
        toast('Gagal', 'error');
    }
    return redirect()->route('status.cuti');
}

}
