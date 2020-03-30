<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroup3Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group3', function (Blueprint $table) {
            $table->Increments('id_gr3');
            $table->integer('id_gr2')->unsigned();
            $table->string('name_gr2');
            $table->foreign('id_gr2')->references('id_gr2')->on('group2')->onDelete('cascade');
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
        Schema::dropIfExists('group3');
    }
}
