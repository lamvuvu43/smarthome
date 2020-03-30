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
            $table->Increments('id_con');
            $table->integer('id_mod')->unsigned();
            $table->integer('id_gr3')->unsigned();
            $table->integer('id_per')->unsigned();
            $table->integer('id_user')->unsigned();

            $table->foreign('id_mod')->references('id_mod')->on('module')->onDelete('cascade');
            $table->foreign('id_gr3')->references('id_gr3')->on('group3')->onDelete('cascade');
            $table->foreign('id_per')->references('id_per')->on('user_permission')->onDelete('cascade');
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('controller');
    }
}
