<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->bigIncrements('id')->nullable(false);
            $table->string('title')->unique()->nullable(false);
            $table->unsignedBigInteger('idPlatform')->nullable(false);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('idPlatform')->references('id')->on('platforms')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('series');
    }
}
