<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ingredients', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name');
            $table->string('store_section');
			$table->timestamps();
		});

        Schema::create('ingredient_recipe', function(Blueprint $table){
            $table->integer('ingredient_id')->unsigned()->nullable();
            $table->integer('recipe_id')->unsigned()->nullable();
            $table->string('amount');
            $table->string('measurement');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('ingredient_recipe');
		Schema::drop('ingredients');
	}

}
