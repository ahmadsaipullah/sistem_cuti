<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanCuti;
use App\Models\PengajuanCutiTh;
use Illuminate\Support\Facades\Auth;

class statusController extends Controller
{
    public function statusCutiTh()
    {
        // karyawan yang login
        $karyawan = Auth::user();
        // Ambil tugas yang diberikan untuk karyawan ini
        $pengajuancutiths = PengajuanCutiTh::with('User')->where('user_id', $karyawan->id)->get();
        return view('pages.pengajuancutith.status', compact('pengajuancutiths'));

    }

    // approve
    public function ApproveTh(Request $request, $id)

    {
        $data       = array();
        $data['status']   = $request->status;

        PengajuanCutiTh::where('id', $id)->update($data);

        if ($data) {
            toast('Approve Berhasil', 'success');
        } else {
            toast('Gagal Terjadi Kesalahan', 'error');
        }
        return back();
    }
//rejected
    public function RejectedTh(Request $request, $id)

    {
        $data       = array();
        $data['status']   = $request->status;

        PengajuanCutiTh::where('id', $id)->update($data);

        if ($data) {
            toast('Rejected Berhasil', 'success');
        } else {
            toast('Gagal Terjadi Kesalahan', 'error');
        }
        return back();
    }


    public function statusCuti()
    {
        // karyawan yang login
        $karyawan = Auth::user();
        // Ambil tugas yang diberikan untuk karyawan ini
        $pengajuancutis = PengajuanCuti::where('user_id', $karyawan->id)->get();
        return view('pages.pengajuancuti.status', compact('pengajuancutis'));

    }

// approve
    public function Approve(Request $request, $id)
{
        $data       = array();
        $data['status']   = $request->status;

        PengajuanCuti::where('id', $id)->update($data);

        if ($data) {
            toast('Approve Berhasil', 'success');
        } else {
            toast('Gagal Terjadi Kesalahan', 'error');
        }
        return back();
    }
//rejected
    public function Rejected(Request $request, $id)

    {
        $data       = array();
        $data['status']   = $request->status;

        PengajuanCuti::where('id', $id)->update($data);

        if ($data) {
            toast('Rejected Berhasil', 'success');
        } else {
            toast('Gagal Terjadi Kesalahan', 'error');
        }
        return back();
    }
}
