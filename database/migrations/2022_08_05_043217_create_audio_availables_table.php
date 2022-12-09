<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudioAvailablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audio_availables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idLanguage')->nullable(false);
            $table->unsignedBigInteger('idSerie')->nullable(false);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('idLanguage')->references('id')->on('languages')->onDelete('restrict');
            $table->foreign('idSerie')->references('id')->on('series')->onDelete('restrict');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audio__availables');
    }
}
