<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLampiranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lampiran', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_user');
            $table->string('nama');
            $table->string('kk');
            $table->string('ktp');
            $table->string('km');
            $table->string('tn');
            $table->string('rek');
            $table->string('ttb');
            $table->string('ak');
            $table->string('ap');
            $table->string('bn');
            $table->string('kak');
            $table->string('sp');
            $table->string('pi');
            $table->string('kkm');
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
        Schema::dropIfExists('lampiran');
    }
}
