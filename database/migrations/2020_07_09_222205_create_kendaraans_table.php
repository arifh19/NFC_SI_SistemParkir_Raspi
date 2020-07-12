<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKendaraansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_polisi');
            $table->string('nama_kendaraan');
            $table->unsignedInteger('pemilik_id');
            $table->string('nomor_kartu');
            $table->string('jenis_kendaraan');
            $table->timestamps();

            $table->foreign('pemilik_id')->references('id')->on('pemiliks')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kendaraans');
    }
}
