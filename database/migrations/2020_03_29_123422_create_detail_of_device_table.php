<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailOfDeviceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_of_device', function (Blueprint $table) {
            $table->string('mac','12');
            $table->integer('id_dev')->unsigned();
            $table->integer('id_stt')->unsigned();
            $table->string('name_house','30');
            $table->foreign('id_dev')->references('id')->on('device')->onDelete('cascade');
            $table->foreign('id_stt')->references('id')->on('status')->onDelete('cascade');
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_of_device');
    }
}
