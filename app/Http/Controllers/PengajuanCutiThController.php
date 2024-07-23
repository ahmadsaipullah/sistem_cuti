<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanCutiTh;
use Illuminate\Support\Facades\Auth;

class PengajuanCutiThController extends Controller
{

    public function index()
    {
        $pengajuancutiths = PengajuanCutiTh::all();
        return view('pages.pengajuancutith.index', compact('pengajuancutiths'));
    }


    public function create()
    {
        return view('pages.pengajuancutith.create');
    }

    public function store(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'required|date',
        'jumlah_hari' => 'required|integer|min:1|max:12',
    ]);

    $jumlah_hari = $request->jumlah_hari;

    if ($jumlah_hari > $user->cuti_th_sisa) {
        toast('Jumlah hari cuti tahunan melebihi sisa cuti', 'error');
        return back();
    }

    $user->cuti_th_sisa -= $jumlah_hari;
    $user->save();

    $data = PengajuanCutiTh::create([
        'user_id' => $user->id,
        'tanggal_mulai' => $request->tanggal_mulai,
        'tanggal_selesai' => $request->tanggal_selesai,
        'jumlah_hari' => $jumlah_hari,
        'status' => 'diajukan',
        'keterangan' => $request->keterangan,
    ]);

    if ($data) {
        toast('Pengajuan Tahunan Berhasil', 'success');
    } else {
        toast('Gagal', 'error');
    }
    return redirect()->route('status.cutith');

}

}
