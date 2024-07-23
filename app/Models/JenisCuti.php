<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisCuti extends Model
{
    use HasFactory;

    protected $lable = 'jenis_cutis';
    protected $fillable = ['nama_cuti','default_hari'];

    public function PengajuanCuti()
    {
        return $this->hasMany(PengajuanCuti::class, 'jenis_cuti_id', 'id');
    }

}
