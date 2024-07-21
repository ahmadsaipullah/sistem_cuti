<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $lable = 'levels';
    protected $fillable = ['level'];

    public function User()
    {
        return $this->hasMany(User::class, 'level_id', 'id');

    }
}
