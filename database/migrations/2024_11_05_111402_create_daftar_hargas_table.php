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
        Schema::create('daftar_hargas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('wilayah_asal_id');
            $table->bigInteger('wilayah_tujuan_id');
            $table->bigInteger('harga_asal');
            $table->bigInteger('harga_satuan');
            $table->bigInteger('jalur_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_hargas');
    }
};
