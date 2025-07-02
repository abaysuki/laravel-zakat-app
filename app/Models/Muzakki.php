<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Muzakki extends Model
{
    protected $fillable = [
    'nama', 'telepon', 'jumlah_jiwa', 'jumlah_zakat',
    'status', 'payment_method', 'cabang', 'tanggal_pembayaran'
];

}
