<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class dashboardController extends Controller
{
    public function index()
    {

        $user = User::all()->count();
        return view('pages.dashboard', compact('user'));
    }

    public function error()
    {
        return view('error.401');
    }



}
