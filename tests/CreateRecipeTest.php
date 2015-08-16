<?php

use Grocer\Models\Recipe;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class CreateRecipeTest extends TestCase
{
	use WithoutMiddleware, DatabaseTransactions;

	private function recipeData()
	{
		$recipeData = [];
		$recipeData['ingredients'] = "2 pounds lean ground beef
 1 envelope dry onion soup mix
 1/2 cup Italian seasoned bread crumbs
 1/4 cup milk
 1/4 cup all-purpose flour
 2 tablespoons vegetable oil
 2 cans condensed cream of chicken soup
 1 packet dry au jus mix";

		return $recipeData;
	}

	public function testCreatesTheCorrectNumberOfIngredients()
	{

		$recipe = Recipe::create($this->recipeData());
		$this->assertTrue( $recipe->ingredients()->count() == 8 );
	}

	public function testAttachesTheCorrectAmountsToTheRecipe()
	{
		$recipe = Recipe::create($this->recipeData());
		
		$dryOnionSoup = $recipe->ingredients()->whereName('dry onion soup mix')->first();

		$this->assertEquals('1', $dryOnionSoup->pivot->amount);
		$this->assertEquals('envelope', $dryOnionSoup->pivot->measurement);

	}
}