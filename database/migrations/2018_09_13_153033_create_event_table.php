<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('days');
            $table->integer('price_ground');
            $table->integer('price_ground_all_days');
            $table->integer('price_stand');
            $table->integer('price_stand_all_days');
            $table->string('domain');
            $table->string('address');
            $table->integer('street_number');
            $table->integer('addition');
            $table->string('zipcode', 7);
            $table->string('city');
            $table->string('country');
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
        Schema::dropIfExists('event');
    }
}
