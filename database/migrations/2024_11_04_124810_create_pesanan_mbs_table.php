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
        Schema::create('pesanan_mbs', function (Blueprint $table) {
            $table->id();
            $table->longText('stt');
            $table->longText('resi');
            $table->bigInteger('customer_id');
            $table->bigInteger('metode_pembayaran_id');
            $table->bigInteger('status_pembayaran_id');
            $table->bigInteger('harga_kg_barang');
            $table->bigInteger('harga_unit');
            $table->bigInteger('harga_diskon');
            $table->bigInteger('biaya_tambahan');
            $table->bigInteger('total_biaya');
            $table->bigInteger('uang_muka');
            $table->bigInteger('uang_sisa');
            $table->date('waktu_pesan');
            $table->date('tanggal_masuk');
            $table->integer('jumlah_koli_awal');
            $table->integer('jumlah_koli_packing');
            $table->string('volume');
            $table->bigInteger('berat');
            $table->string('dimensi');
            $table->string('unit');
            $table->string('kubikasi');
            $table->bigInteger('jalur_id');
            $table->bigInteger('wilayah_asal_id');
            $table->bigInteger('wilayah_tujuan_id');
            $table->bigInteger('cabang_id');
            $table->bigInteger('karyawan_id');
            $table->string('nama_penerima');
            $table->string('no_telp_penerima');
            $table->string('diterima_oleh');
            $table->longText('catatan_barang');
            $table->longText('instruksi');
            $table->longText('alamat_detail_tujuan');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan_mbs');
    }
};
