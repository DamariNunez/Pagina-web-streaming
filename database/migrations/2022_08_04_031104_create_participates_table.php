<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participates', function (Blueprint $table) {
            $table->bigIncrements('id')->nullable(false);
            $table->unsignedBigInteger('idSerie')->nullable(false);
            $table->unsignedBigInteger('idActor')->nullable(false);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('idActor')->references('id')->on('actors')->onDelete('restrict');
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
        Schema::dropIfExists('participates');
    }
}
