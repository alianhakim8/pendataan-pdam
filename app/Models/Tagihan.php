<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;
    protected $table = 'tb_tagihan';
    protected $fillable = ['id_pelanggan', 'tahun', 'bulan', 'jml_tagih', 'jml_bayar', 'meter_kubik', 'tgl_bayar'];
}
