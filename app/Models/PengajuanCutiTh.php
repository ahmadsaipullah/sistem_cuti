<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanCutiTh extends Model
{
    use HasFactory;

    protected $lable = 'pengajuan_cuti_ths';
    protected $fillable = ['user_id','tanggal_mulai','tanggal_selesai','jumlah_hari','status','keterangan'];


    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
