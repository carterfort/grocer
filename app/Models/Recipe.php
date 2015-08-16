<?php

namespace Grocer\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{

    protected $fillable = [
        'name',
        'url',
        'photo_url'
    ];


    public static function create(array $attributes = [])
    {
        $recipe = parent::create($attributes);
        Ingredient::createForRecipeWithIngredientsString($recipe, $attributes['ingredients']);

        return $recipe;
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class)->withPivot(['amount', 'measurement']);
    }

    public function steps()
    {
        return $this->hasMany(RecipeStep::class);
    }

    public function history()
    {
        return $this->belongsToMany(WeeklyList::class)->withPivot(['meal_time', 'meal_date']);
    }
}