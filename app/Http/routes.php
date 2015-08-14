<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Grocer\Models\Recipe;

Route::get('/', function () {

    $recipes = Recipe::with(['steps', 'ingredients', 'history'])->get();

    return view('all-recipes', compact('recipes'));
});
