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
        Schema::create('cuti_settings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pegawai_id')->unique();
            $table->integer('kuota_cuti_tahunan');
            $table->integer('cutiN_1')->default(0);
            $table->integer('cutiN_2')->default(0);
            $table->integer('cuti_diambil')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuti_settings');
    }
};
