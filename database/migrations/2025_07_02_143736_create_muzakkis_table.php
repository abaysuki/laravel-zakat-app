<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('muzakkis', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('telepon');
        $table->integer('jumlah_jiwa');
        $table->integer('jumlah_zakat');
        $table->string('status')->default('pending');
        $table->string('payment_method');
        $table->string('cabang');
        $table->dateTime('tanggal_pembayaran');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('muzakkis');
    }
};
