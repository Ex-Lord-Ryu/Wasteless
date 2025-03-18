<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;

    protected $table = 'mitras';

    protected $fillable = [
        'nama_bisnis',
        'nama_pic',
        'email',
        'jenis_makanan',
        'no_telepon',
        'alamat',
        'banyak_penjualan',
        'status',
    ];
}
