<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZakatFitrah extends Model
{
    protected $fillable = [
        'user_id', 'jiwa', 'tipe', 'takaran', 'total',
        'status', 'paid_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
