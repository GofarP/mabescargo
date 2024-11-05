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
        Schema::create('sales_after_services', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->date('tanggal_masuk');
            $table->date('tanggal_done');
            $table->bigInteger('pesanan_mbs_cargo_id');
            $table->longText('keterangan');
            $table->longText('kendala');
            $table->longText('kritik_saran');
            $table->integer('tingkat_kepuasan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_after_services');
    }
};
