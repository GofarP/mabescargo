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
        Schema::create('customer_lamas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('no_telp');
            $table->string('organisasi');
            $table->longText('alamat_detail');
            $table->enum('agama',['islam','kristen katolik','kristen protestan','hindu','buddha','khonghucu']);
            $table->date('tanggal_lahir');
            $table->longText('tempat_lahir');
            $table->bigInteger('wilayah_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_lamas');
    }
};
