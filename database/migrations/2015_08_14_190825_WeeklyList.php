<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class WeeklyList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('weekly_lists', function(Blueprint $table){
            $table->increments('id');
            $table->date('starts_at');
            $table->timestamps();
        });

        Schema::create('recipe_weekly_list', function(Blueprint $table){
            $table->integer('recipe_id')->unsigned();
            $table->foreign('recipe_id')->references('id')->on('recipes');
            $table->integer('weekly_list_id')->unsigned();
            $table->foreign('weekly_list_id')->references('id')->on('weekly_lists');
            $table->enum('meal_time', ['Breakfast', 'Lunch', 'Dinner', 'Snack']);
            $table->date('meal_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('recipe_weekly_list');
        Schema::drop('weekly_lists');
    }
}
