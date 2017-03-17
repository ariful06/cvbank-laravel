@extends('Admin.master')

@section('title', 'Education')
@section('sub-title','Add Award Info')
@section('resume-select', 'active')
@section('award-select', 'active')


@section('right-side-icon')
<li class="dropdown">
	<a href="/dashboard/award/deleted">
		<i class="icon-trash-alt position-left"></i>
		Trashed Item
	</a>
</li>
@endsection


@section('in-head')


<script type="text/javascript">

</script>
@endsection



@section('content')




	<div class="col-md-offset-3 col-md-6"> 
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h6 class="panel-title" style="text-align: center;">Add a Award</h6>
			</div>
			
			<div class="panel-body">

			@include('layouts.include.errors')
			@include('layouts.include.sessionmessage')

				{{Form::open(['url' => '/dashboard/award'  ])}}
				
				<div class="form-group">
					<label for="title">Tilte</label>
					<input type="text" name="title" class="form-control" value="{{old('title')}}" required>
				</div>

				<div class="form-group">
					<label for="institute">Organization Name</label>
					<input type="text" name="organization" class="form-control" value="{{old('organization')}}" required>
				</div>

				<div class="form-group">
					<label for="description">location</label>
					<input type="text" name="location" class="form-control" value="{{old('location')}}" required>
				</div>



				<div class="form-group">
					<label for="description">Description</label>

					<textarea id="description" name="description" class="form-control">{{old('description')}}</textarea>
				</div>



				<div class="form-group">
					<label for="description">year</label>
					<input type="number" name="year" class="form-control" value="{{old('year')}}" required>
				</div>



				<div class="form-group" style="text-align: center;">
					<button type="submit" class="btn btn-primary">Add <i class=" icon-plus-circle2 position-right"></i></button>

					
				</div>




				{{Form::close()}}

			</div>
		</div>
	</div>






@endsection