<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('syahriahs', function (Blueprint $table) {
            $table->id();
            $table->string('bulan_tagihan');
            $table->decimal('besar_tagihan', 15, 2);
            $table->decimal('jumlah_bayar', 15, 2);
            $table->decimal('sisa', 15, 2)->nullable();
            $table->decimal('kurang', 15, 2)->nullable();
            $table->enum('keterangan', ['lunas', 'belum lunas']);
            $table->timestamp('waktu_bayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('syahriahs');
    }
};
