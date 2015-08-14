<?php

namespace Grocer\Models;

use Illuminate\Database\Eloquent\Model;

class RecipeStep extends Model
{
    //

    protected $fillable = [
        'recipe_id',
        'instruction',
        'duration_seconds'
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
