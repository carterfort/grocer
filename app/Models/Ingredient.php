<?php

namespace Grocer\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    //

    protected $fillable = [
        'name',
        'store_section'
    ];

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class);
    }
}
