@extends('layouts.standard')

@section('body')

    <h3>Recipes
        <a href="{{route('recipes.create')}}" class="btn btn-default  pull-right">+ Add new Recipe</a>
    </h3>

    <div class="list-group">
    @foreach($recipes as $recipe)
        <a class="list-group-item" href="{{route('recipes.show', $recipe->id)}}">
           <div class="row">
               <div class="col-sm-1 text-center">
                   <span class="glyphicon glyphicon-bell"></span>
               </div>
               <div class="col-sm-6">
                   {{$recipe->name}}

               </div>
           </div>
        </a>
    @endforeach
    </div>

    @stop