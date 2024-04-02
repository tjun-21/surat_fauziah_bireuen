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
        Schema::create('cutis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawai_id');
            $table->date('tgl_mulai');
            $table->date('tgl_akhir');
            $table->foreignId('jcuti_id');
            $table->string('alasan');
            $table->string('alamat_cuti');
            $table->bigInteger('pt_1')->default('0');
            $table->bigInteger('pt_2')->default('0');
            $table->integer('j_hari')->default('0');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cutis');
    }
};
