@extends('layouts.standard')

@section('body')
	<h3>Make with the meal planning</h3>

	<div class="row">
		<div class="col-sm-6">

		</div>
		<div class="col-sm-6">

			<h4>Shopping List</h4>

			<div class="list-group">
				@foreach($thisWeek->ingredients as $ingredient)
					<div class="list-group-item">
						{{$ingredient->single_line_description}}
					</div>
				@endforeach
			</div> 

		</div>
	</div>


	
@stop