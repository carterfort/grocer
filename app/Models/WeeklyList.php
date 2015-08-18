<?php

namespace Grocer\Models;

use Carbon\Carbon;
use Grocer\Models\Ingredient;
use Grocer\Models\Recipe;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class WeeklyList extends Model
{
    //

	protected $fillable = [
		'starts_at'
	];

	protected $dates = [
		'starts_at'
	];



	public static function currentWeek()
	{
		$startDate = Carbon::now()->startOfWeek()->subDays(1);
		return static::firstOrCreate(['starts_at' => $startDate]);
	}

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class)->withPivot(['meal_time', 'meal_date']);
    }

    public function ingredients()
    {
    	$ingredients = new Collection();
    	foreach ($this->recipes as $recipe)
    	{
    		$ingredients = $ingredients->merge($recipe->ingredients);
    	}

    	$ingredients->unique();

    	return $ingredients;
    }

    public function getIngredientsAttribute()
    {
    	return $this->ingredients();
    }
}
