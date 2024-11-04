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
        Schema::create('followup_customer_lamas', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->bigInteger('customer_lama_id');
            $table->longText('respon');
            $table->longText('kendala');
            $table->bigInteger('karyawan_id');
            $table->bigInteger('kategori_customer_id');
            $table->bigInteger('tipe_pelanggan_id');
            $table->date('terakhir_kirim');
            $table->bigInteger('jumlah_kirim');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('followup_customer_lamas');
    }
};
