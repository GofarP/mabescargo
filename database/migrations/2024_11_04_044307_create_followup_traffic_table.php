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
        Schema::create('followup_traffic', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->bigInteger('followup_customer_id');
            $table->string('no_telp');
            $table->longText('respon');
            $table->longText('kendala');
            $table->string('barang');
            $table->bigInteger('wilayah_asal_id');
            $table->bigInteger('wilayah_tujuan_id');
            $table->bigInteger('harga_barang');
            $table->bigInteger('budget');
            $table->bigInteger('harga_kendaraan');
            $table->bigInteger('karyawan_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('followup_traffic');
    }
};
