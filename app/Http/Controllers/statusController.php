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
        $pengajuan = PengajuanCutiTh::find($id);

        if (!$pengajuan) {
            toast('Pengajuan tidak ditemukan', 'error');
            return back();
        }

        $user = $pengajuan->user;
        $status = $request->input('status'); // Mengambil status dari input

        // Jika status diubah menjadi disetujui
        if ($status == 'disetujui') {
            // Periksa apakah pengguna memiliki cukup sisa cuti
            if ($pengajuan->jumlah_hari > $user->cuti_th_sisa) {
                toast('Jumlah hari cuti tahunan melebihi sisa cuti', 'error');
                return back();
            }

            // Kurangi sisa cuti tahunan pengguna
            $user->cuti_th_sisa -= $pengajuan->jumlah_hari;
            $user->save(); // Simpan perubahan sisa cuti
        }

        // Perbarui status pengajuan
        $pengajuan->status = $status;
        $pengajuan->save();

        // Tampilkan pesan berdasarkan hasil update
        if ($pengajuan->wasChanged()) {
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
