<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParkirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkirs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('kendaraan_id');
            $table->boolean('status')->default(0);
            $table->string('clock_in');
            $table->string('clock_out')->nullable();
            $table->timestamps();
            $table->foreign('kendaraan_id')->references('id')->on('kendaraans')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parkirs');
    }
}
