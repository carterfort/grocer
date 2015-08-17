@extends('layouts.standard')

@section('body')

    <h4>Create a recipe</h4>

    @if($errors->any())
        @foreach($errors->all() as $error)
            <p class="text-danger">{{$error}}</p>
            @endforeach
    @endif

    <form action="{{route('recipes.store')}}" method="post">
        {!! csrf_field() !!}

        <div class="row">
            <div class="col-sm-3">
               <input type="text" name="name" placeholder="Recipe Name" class="form-control" value="{{ old("name") }}"/>
            </div>
            <div class="col-sm-4">
                <input type="text" name="url" placeholder="Reference URL" class="form-control" value="{{ old("url") }}"/>
            </div>
            <div class="col-sm-5">
                <input type="text" name="photo_url" placeholder="Photo URL" class="form-control " value="{{ old("photo_url") }}"/>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-sm-6">
                <textarea name="ingredients" rows="5" placeholder="Ingredients" class="form-control ">{{ old('ingredients') }}</textarea>
            </div>
            <div class="col-sm-6">
                <textarea name="instructions" rows="8" placeholder="Step-by-step..." class="form-control">{{ old('instructions') }}</textarea>
            </div>
        </div>
        <br/>

        <button class="btn btn-success">Save Recipe</button>

    </form>

@stop