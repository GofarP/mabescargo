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
        Schema::create('followup_customers', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('nama');
            $table->string('no_telp');
            $table->bigInteger('harga_barang');
            $table->bigInteger('harga_kendaraan');
            $table->bigInteger('berat_minimal');
            $table->bigInteger('budget');
            $table->bigInteger('wilayah_asal_id');
            $table->bigInteger('wilayah_tujuan_id');
            $table->bigInteger('kontak_id');
            $table->enum('status',['selesai','belum selesai']);
            $table->bigInteger('karyawan_id');
            $table->longText('keterangan_harga');
            $table->longText('barang');
            $table->longText('kendala');
            $table->longText('tanggapan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('followup_customers');
    }
};
