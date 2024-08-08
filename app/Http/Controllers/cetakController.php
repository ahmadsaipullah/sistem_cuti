<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanCuti;
use App\Models\PengajuanCutiTh;
use Barryvdh\DomPDF\Facade\Pdf;

class cetakController extends Controller
{
    public function cuti()
    {
        $pengajuancutis = PengajuanCuti::all();
        $pdf = Pdf::loadView('pages.pengajuancuti.pdf', compact('pengajuancutis'))->setPaper('a4');;
        return $pdf->download('pengajuancuti.pdf');
    }
    public function cutith()
    {
        $pengajuancutiths = PengajuanCutiTh::all();
        $pdf = Pdf::loadView('pages.pengajuancutith.pdf', compact('pengajuancutiths'))->setPaper('a4');;
        return $pdf->download('pengajuancuti.pdf');
    }

    public function home(){
        return view('home');
    }
}
