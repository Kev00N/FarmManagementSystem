<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCropsTable extends Migration
{
    public function up()
    {
        Schema::create('crops', function (Blueprint $table) {
            $table->increments('crop_id');
            $table->string('crop_name');
            $table->string('crop_type');
            $table->timestamps();
        });

        Schema::create('irrigation_schedules', function (Blueprint $table) {
            $table->increments('schedule_id');
            $table->unsignedInteger('crop_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('duration');
            
            $table->foreign('crop_id')->references('crop_id')->on('crops');
        });

        Schema::create('fertilizer_recommendations', function (Blueprint $table) {
            $table->increments('recommendation_id');
            $table->unsignedInteger('crop_id');
            $table->string('fertilizer_type');
            $table->text('recommendation_text');
            
            $table->foreign('crop_id')->references('crop_id')->on('crops');
        });
    }

    public function down()
    {
        Schema::dropIfExists('fertilizer_recommendations');
        Schema::dropIfExists('irrigation_schedules');
        Schema::dropIfExists('crops');
    }
}
