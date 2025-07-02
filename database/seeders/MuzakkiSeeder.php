<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Muzakki;
use Carbon\Carbon;

class MuzakkiSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Muzakki::create([
                'nama' => 'Muzakki ' . $i,
                'telepon' => '0812345678' . $i,
                'jumlah_jiwa' => rand(1, 6),
                'jumlah_zakat' => rand(30000, 50000),
                'status' => 'pending',
                'payment_method' => 'tunai',
                'cabang' => 'Cabang ' . rand(1, 3),
                'tanggal_pembayaran' => Carbon::now()->subDays(rand(0, 10)),
            ]);
        }
    }
}
