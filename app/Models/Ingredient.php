<?php

namespace Grocer\Models;

use Grocer\Converters\IngredientListConverter;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    //

    protected $fillable = [
        'name',
        'store_section'
    ];

    public static function createForRecipeWithIngredientsString($recipe, $ingredients)
    {

        $converter = new IngredientListConverter($ingredients);
        $items = $converter->convertedList();

        foreach ($items as $item)
        {
            $ingredient = static::firstOrCreate(['name' => $item['name']]);

            $recipe->ingredients()->attach($ingredient->id, [
                    'amount' => $item['amount'],
                    'measurement' => $item['measurement']
                ]);
        }
    }

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class);
    }

    public function getSingleLineDescriptionAttribute()
    {
        $string = [];
        $string[] = $this->pivot->amount;
        $string[] = $this->pivot->measurement;
        $string[] = $this->name;

        return implode(' ', $string);
    }
}
