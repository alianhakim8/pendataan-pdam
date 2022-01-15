<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPelangganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pelanggan', function (Blueprint $table) {
            $table->integer('no_pelanggan');
            $table->string('nama');
            $table->integer('telepon');
            $table->integer('no_ktp');
            $table->integer('no_kk');
            $table->string('gender');
            $table->unsignedBigInteger('id_kecamatan');
            $table->unsignedBigInteger('id_kelurahan');
            $table->integer('rw');
            $table->integer('rt');
            $table->text('alamat');
            $table->foreign('id_kecamatan')->references('id')->on('tb_kecamatan')->onDelete('cascade');
            $table->foreign('id_kelurahan')->references('id')->on('tb_kelurahan')->onDelete('cascade');
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
        Schema::dropIfExists('tb_pelanggan');
    }
}
