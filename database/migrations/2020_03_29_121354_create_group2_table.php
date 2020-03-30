<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroup2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group2', function (Blueprint $table) {
            $table->increments('id_gr2');
            $table->integer('id_gr1')->unsigned();
            $table->string('name_gr2');
            $table->foreign('id_gr1')->references('id_gr1')->on('group1')->onDelete('cascade');
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
        Schema::dropIfExists('group2');
    }
}
