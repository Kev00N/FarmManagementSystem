<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutgoingFertilizersTable extends Migration
{
    public function up()
    {
        Schema::create('outgoing_fertilizers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('fertilizer_id');
            $table->integer('quantity');
            $table->timestamps();

            // Add foreign key constraint to fertilizer_id referencing fertilizers table
            $table->foreign('fertilizer_id')->references('fertilizer_id')->on('fertilizers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('outgoing_fertilizers');
    }
}
