<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersentaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persentase', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('total_penerima');
            $table->integer('id_kabupaten')->references('id')->on('kabupatens');
            $table->integer('id_jenis_bantuan')->references('id')->on('jenis_bantuans');
            $table->integer('total_penerima_terealisasi');
            $table->integer('total_penerima_terealisasi_persen');
            $table->integer('total_penerima_dalam_antrian');
            $table->integer('total_penerima_dalam_antrian_persen');
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
        Schema::dropIfExists('persentase');
    }
}
