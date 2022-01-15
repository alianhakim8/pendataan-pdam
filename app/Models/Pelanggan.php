<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'no_pelanggan', 'nama', 'telepon', 'no_ktp', 'no_kk', 'gender', 'id_kecamatan', 'id_kelurahan', 'rw', 'rt', 'alamat',
    ];
    protected $table = 'tb_pelanggan';

    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class, 'id_kecamatan', 'id');
    }

    public function kelurahan()
    {
    }
}
