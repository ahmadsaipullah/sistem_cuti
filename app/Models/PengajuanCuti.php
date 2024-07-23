<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanCuti extends Model
{
    use HasFactory;

    protected $lable = 'pengajuan_cutis';
    protected $fillable = ['user_id','jenis_cuti_id','tanggal_mulai','tanggal_selesai','jumlah_hari','status','keterangan'];


    public function JenisCuti()
    {
        return $this->belongsTo(JenisCuti::class, 'jenis_cuti_id', 'id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
