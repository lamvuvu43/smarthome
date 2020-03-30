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
            $table->string('serial','12');
            $table->integer('id_dev')->unsigned();
            $table->string('name','30');
            $table->foreign('id_dev')->references('id_dev')->on('device')->onDelete('cascade');
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
        Schema::dropIfExists('detail_of_device');
    }
}
