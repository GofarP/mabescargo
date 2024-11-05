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
        Schema::create('sebar_brosurs', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->bigInteger('karyawan_id');
            $table->longText('nama_toko');
            $table->string('nama');
            $table->string('no_telp');
            $table->string('alamat');
            $table->longText('pernah_pakai_ekspedisi');
            $table->longText('nama_ekspedisi');
            $table->bigInteger('biaya');
            $table->longText('kenal_men_cargo');
            $table->longText('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sebar_brosurs');
    }
};
