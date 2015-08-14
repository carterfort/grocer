<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('recipes', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name');
            $table->string('url');
            $table->string('photo_url');
			$table->timestamps();
		});

		Schema::create('recipe_steps', function(Blueprint $table){
			$table->increments('id');
			$table->integer('recipe_id')->unsigned();
			$table->foreign('recipe_id')->references('id')->on('recipes');
			$table->string('instruction');
			$table->integer('duration_seconds')->nullable();
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
		Schema::drop('recipe_steps');
		Schema::drop('recipes');
	}

}
