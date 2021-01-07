<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormulirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulir', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_user');
            $table->string('nama');
            $table->string('no_ktp');
            $table->string('no_hp');
            $table->string('tempat_lahir');
            $table->string('tgl_lahir');
            $table->string('jk');
            $table->string('agama');
            $table->text('alamat');
            $table->string('kec');
            $table->string('desa');
            $table->string('nim');
            $table->string('nama_kampus');
            $table->string('fakultas');
            $table->string('jurusan');
            $table->string('akre_kampus');
            $table->string('akre_prodi');
            $table->string('thn_angkatan');
            $table->string('ipk');
            $table->string('no_rek');
            $table->string('bank');
            $table->string('nama_rek');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('jml_saudara');
            $table->string('pekerjaan_ibu');
            $table->string('pekerjaan_ayah');
            $table->string('foto');
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
        Schema::dropIfExists('formulir');
    }
}
