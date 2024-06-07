<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Syahriah extends Model
{
    use HasFactory;

    protected $fillable = [
        'bulan_tagihan',
        'besar_tagihan',
        'jumlah_bayar',
        'sisa',
        'kurang',
        'keterangan',
        'waktu_bayar',
    ];
}
