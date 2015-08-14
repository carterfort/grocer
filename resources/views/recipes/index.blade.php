@extends('layouts.standard')

@section('body')

    <h3>Recipes</h3>

    <div class="list-group">
    @foreach($recipes as $recipe)
        <a class="list-group-item" href="{{route('recipes.show', $recipe->id)}}">
            {{$recipe->name}}
        </a>
    @endforeach
    </div>

    @stop