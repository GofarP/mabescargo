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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('nama');
            $table->string('email');
            $table->string('no_telp');
            $table->bigInteger('wilayah_id');
            $table->longText('alamat_detail');
            $table->enum('agama',['islam','kristen katolik','kristen protestan','hindu','buddha','khonghucu']);
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
