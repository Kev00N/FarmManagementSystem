<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYieldPredictionTable extends Migration
{
    public function up()
    {
        Schema::create('yield_prediction', function (Blueprint $table) {
            $table->increments('prediction_id');
            $table->unsignedInteger('crop_id');
            $table->foreign('crop_id')->references('crop_id')->on('crops');
            $table->date('prediction_date');
            $table->float('yield_value');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('yield_prediction');
    }
}
