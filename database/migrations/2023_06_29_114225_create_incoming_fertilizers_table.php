<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomingFertilizersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incoming_fertilizers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('fertilizer_id');
            $table->integer('quantity');
            $table->decimal('price_per_unit', 8, 2);
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('fertilizer_id')->references('fertilizer_id')->on('fertilizers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incoming_fertilizers');
    }
}
