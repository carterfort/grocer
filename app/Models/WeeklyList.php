<?php

namespace Grocer\Models;

use Illuminate\Database\Eloquent\Model;

class WeeklyList extends Model
{
    //
    public function recipes()
    {
        return $this->belongsToMany(Recipe::class);
    }
}
