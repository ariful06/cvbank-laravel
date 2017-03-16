@extends('Admin.master')

@section('title', 'Award')
@section('sub-title','Edit Award information')
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
				<h6 class="panel-title" style="text-align: center;">Edit Award info</h6>
			</div>
			
			<div class="panel-body">

			@include('layouts.include.errors')
			@include('layouts.include.sessionmessage')

				{{Form::open(['url' => "/dashboard/award/$data->id/update/" ])}}
				
				<div class="form-group">
					<label for="title">Tilte</label>
					<input type="text" name="title" class="form-control" value="{{$data->title}}" required>
				</div>

				<div class="form-group">
					<label for="institute">Organization Name</label>
					<input type="text" name="organization" class="form-control" value="{{$data->organization}}" required>
				</div>

				<div class="form-group">
					<label for="location">location</label>
					<input type="text" name="location" class="form-control" value="{{$data->location}}" required>
				</div>



				<div class="form-group">
					<label for="description">Description</label>

					<textarea id="description" name="description" class="form-control">{{$data->description}}</textarea>
				</div>



				<div class="form-group">
					<label for="description">year</label>
					<input type="number" name="year" class="form-control" value="{{$data->year}}" required>
				</div>



				<div class="form-group" style="text-align: center;">
					<button type="submit" class="btn btn-danger">Update Information <i class="icon-spinner9 position-right"></i></button>
				</div>




				{{Form::close()}}

			</div>
		</div>
	</div>






@endsection