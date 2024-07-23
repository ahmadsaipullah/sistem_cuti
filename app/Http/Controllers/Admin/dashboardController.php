<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\JenisCuti;
use App\Models\PengajuanCuti;
use App\Models\PengajuanCutiTh;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class dashboardController extends Controller
{
    public function index()
    {

        $user = User::all()->count();
        $jeniscuti = JenisCuti::all()->count();
        $pengajuancuti = PengajuanCuti::all()->count();
        $pengajuancutith = PengajuanCutiTh::all()->count();
        return view('pages.dashboard', compact('user','jeniscuti','pengajuancuti','pengajuancutith'));
    }

    public function error()
    {
        return view('error.401');
    }



}
