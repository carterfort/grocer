@extends('layouts.standard')

@section('body')

    <h4>{{$recipe->name}} - {{$recipe->display_prep_time}}</h4>
    <div class="row">
        <div class="col-sm-3">
            {!!$recipe->image!!}
        </div>
        <div class="col-sm-3">
            <div class="list-group">
                @foreach($recipe->ingredients as $ingredient)
                    <div class="list-group-item">
                        {{ $ingredient->single_line_description }}
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-sm-6">
            {!! $recipe->display_instructions !!}
        </div>
    </div>

@stop