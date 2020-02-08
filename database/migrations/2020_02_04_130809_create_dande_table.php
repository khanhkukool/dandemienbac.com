<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDandeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dande', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('so_lo');
            $table->string('so_de');
            $table->string('result_lo')->nullable();
            $table->string('result_de')->nullable();
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
        Schema::dropIfExists('dande');
    }
}
