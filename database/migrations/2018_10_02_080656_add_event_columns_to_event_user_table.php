<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEventColumnsToEventUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_user', function (Blueprint $table) {
            $table->integer('stalls')->after('user_id');
            $table->integer('ground_spots')->after('user_id');
            $table->string('sell_types')->after('user_id');
            $table->enum('food', ['food','non-food'])->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_user', function (Blueprint $table) {
            $table->dropColumn(['stalls', 'ground_spots', 'sell_types', 'food']);
        });
    }
}
