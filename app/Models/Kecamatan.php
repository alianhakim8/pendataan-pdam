<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'kecamatan', 'kode_pos'];
    protected $table = 'tb_kecamatan';
}
