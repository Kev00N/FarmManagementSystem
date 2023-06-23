<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCropInputsTable extends Migration
{
    public function up()
    {
        Schema::create('crop_inputs', function (Blueprint $table) {
            $table->increments('crop_input_id');
            $table->unsignedInteger('crop_id');
            $table->foreign('crop_id')->references('crop_id')->on('crops');
            $table->integer('amount_in_sacs');
            $table->timestamps();
            $table->string('_token')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('crop_inputs');
    }
}
