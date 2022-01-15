<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbTagihanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_tagihan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pelanggan');
            $table->integer('tahun');
            $table->string('bulan');
            $table->integer('meter_kubik');
            $table->double('jml_tagih');
            $table->double('jml_bayar');
            $table->date('tgl_bayar');
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
        Schema::dropIfExists('tb_tagihan');
    }
}
