<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventTableNullableFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event', function (Blueprint $table) {
            $table->string('price_ground_all_days')->nullable()->change();
            $table->string('price_stand_all_days')->nullable()->change();
            $table->string('addition')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event', function (Blueprint $table) {
            $table->string('price_ground_all_days')->nullable(false)->change();
            $table->string('price_stand_all_days')->nullable(false)->change();
            $table->string('addition')->nullable(false)->change(false);
        });
    }
}
