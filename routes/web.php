<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cetakController;
use App\Http\Controllers\statusController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\PengajuanCutiController;
use App\Http\Controllers\PengajuanCutiThController;
use App\Http\Controllers\Admin\{adminController,dashboardController,jenisCutiController};


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require __DIR__.'/auth.php';

Route::get('/error-page', [dashboardController::class,'error'])->name('error');

Route::get('/', [cetakController::class, 'home'])->name('home');

Route::group(['middleware' => 'auth', 'PreventBackHistory'], function () {

// dashboard
Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');

// profile
Route::get('/profile/{encryptedId}/edit' ,[profileController::class, 'index'])->name('profile.index');
Route::put('/profile/password-update' ,[profileController::class, 'updatePassword'])->name('profile.updatePassword');
Route::put('/profile/{id}' ,[profileController::class, 'update'])->name('profile.update');


Route::middleware(['AdminSuper'])->group( function(){

// crud admin
Route::resource('/admin', adminController::class);
Route::resource('/jeniscuti', jenisCutiController::class);

// pengajuan cuti
Route::get('/pengajuan-cuti', [PengajuanCutiController::class,'index'])->name('pengajuancuti.index');
Route::post('/approve/{id}', [statusController::class, 'Approve'])->name('approve');
Route::post('/rejected/{id}', [statusController::class, 'Rejected'])->name('rejected');

// pengajuan cuti tahunan
Route::get('/pengajuan-cuti-th', [PengajuanCutiThController::class,'index'])->name('pengajuancutith.index');
Route::post('/approveth/{id}', [statusController::class, 'ApproveTh'])->name('approve.th');
Route::post('/rejectedth/{id}', [statusController::class, 'RejectedTh'])->name('rejected.th');


//cetak pdf
Route::get('/export/pdf/cuti', [cetakController::class, 'cuti'])->name('cuti.pdf');
Route::get('/export/pdf/cuti-th', [cetakController::class, 'cutith'])->name('cutith.pdf');





});



Route::middleware(['Admin'])->group( function(){

// pengajuan cuti
Route::get('/pengajuan-cuti', [PengajuanCutiController::class,'index'])->name('pengajuancuti.index');
Route::post('/approve/{id}', [statusController::class, 'Approve'])->name('approve');
Route::post('/rejected/{id}', [statusController::class, 'Rejected'])->name('rejected');

// pengajuan cuti tahunan
Route::get('/pengajuan-cuti-th', [PengajuanCutiThController::class,'index'])->name('pengajuancutith.index');
Route::post('/approveth/{id}', [statusController::class, 'ApproveTh'])->name('approve.th');
Route::post('/rejectedth/{id}', [statusController::class, 'RejectedTh'])->name('rejected.th');

//cetak pdf
Route::get('/export/pdf/cuti', [cetakController::class, 'cuti'])->name('cuti.pdf');
Route::get('/export/pdf/cuti-th', [cetakController::class, 'cutith'])->name('cutith.pdf');



});



Route::middleware(['User'])->group( function(){


Route::get('/daftar/pengajuan-cuti-th', [PengajuanCutiThController::class,'create'])->name('pengajuancutith.create');
Route::post('/pengajuan-cuti-th', [PengajuanCutiThController::class,'store'])->name('pengajuancutith.store');

Route::get('/daftar/pengajuan-cuti', [PengajuanCutiController::class,'create'])->name('pengajuancuti.create');
Route::post('/pengajuan-cuti', [PengajuanCutiController::class,'store'])->name('pengajuancuti.store');

Route::get('/status/cuti-th', [statusController::class, 'statusCutiTh'])->name('status.cutith');
Route::get('/status/cuti', [statusController::class, 'statusCuti'])->name('status.cuti');

});







});

