<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControllerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controller', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('id_mod')->unsigned();
            $table->integer('id_room')->unsigned()->nullable();
            $table->integer('id_per')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->string('name_con',50)->nullable();
            $table->foreign('id_mod')->references('id')->on('module')->onDelete('cascade');
            $table->foreign('id_room')->references('id')->on('room')->onDelete('cascade');
            $table->foreign('id_per')->references('id')->on('user_permission')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('controller');
    }
}
