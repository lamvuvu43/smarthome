<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('id_stt')->unsigned();
            $table->integer('id_mod_type')->unsigned();
            $table->string('mac','12');
            $table->string('name_mod','10');
            $table->integer('value');
            $table->foreign('id_stt')->references('id')->on('status')->onDelete('cascade');
            $table->foreign('id_mod_type')->references('id')->on('module_type')->onDelete('cascade');
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
        Schema::dropIfExists('module');
    }
}
