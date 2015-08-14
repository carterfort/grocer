<?php

use Grocer\Models\Ingredient;
use Grocer\Models\Recipe;
use Grocer\Models\RecipeStep;
use Grocer\Models\WeeklyList;

class RecipeSeeder extends DatabaseSeeder {

    public function run()
    {
        factory(Recipe::class, 50)->create()->each(function($recipe) {

            $ingredients = factory(Ingredient::class, rand(5,10))->create();
            $sync = [];
            foreach ($ingredients as $greed)
            {
                $sync[$greed->id] = ['amount' => rand(1,16).' oz'];
            }

            $recipe->ingredients()->sync($sync);

            factory(RecipeStep::class, rand(1,7))->create(['recipe_id' => $recipe->id]);

        });
    }
}