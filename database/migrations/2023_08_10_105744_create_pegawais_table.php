<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nik')->unique();
            $table->bigInteger('nip')->unique();
            $table->string('nama');
            $table->string('tmp_lahir');
            $table->date('tgl_lahir');
            $table->string('pendidikan');
            $table->bigInteger('no_hp');
            $table->string('email');
            $table->date('tmt');
            $table->date('tmt_sk');
            $table->date('tmt_masuk');
            $table->enum('j_kelamin', ['L', 'P', 'O']);
            $table->foreignId('kategori_id');
            $table->foreignId('golongan_id');
            $table->foreignId('jabatan_id');
            $table->foreignId('fungsional_id');
            $table->foreignId('unit_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawais');
    }
}
