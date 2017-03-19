@extends('Admin.master')

@section('title', 'Education')
@section('sub-title','Add Award Info')
@section('resume-select', 'active')
@section('experience-select', 'active')


@section('right-side-icon')
<li class="dropdown">
	<a href="/dashboard/experience/deleted">
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
				<h6 class="panel-title" style="text-align: center;">Add a Experience</h6>
			</div>
			
			<div class="panel-body">

			@include('layouts.include.errors')
			@include('layouts.include.sessionmessage')

				{{Form::open(['url' => '/dashboard/experience'  ])}}
				
				<div class="form-group">
					<label for="designation">Designation</label>
					<input type="text" name="designation" class="form-control" value="{{old('designation')}}" required>
				</div>

				<div class="form-group">
					<label for="company_name">Company Name</label>
					<input type="text" name="company_name" class="form-control" value="{{old('company_name')}}" required>
				</div>

					
				<div class="form-group">
					<label for="start_date">Start Date</label>
					<input type="date" name="start_date" class="form-control" value="{{old('start_date')}}" required>
				</div>

				<div class="form-group">
					<label for="end_date">End Date</label>
					<input type="date" name="end_date" class="form-control" value="{{old('end_date')}}" >
				</div>


				<div class="form-group">
					<label for="company_location">Company Location</label>
					<input type="text" name="company_location" class="form-control" value="{{old('company_location')}}" required>
				</div>





				<div class="form-group" style="text-align: center;">
					<button type="submit" class="btn btn-primary">Add <i class=" icon-plus-circle2 position-right"></i></button>

					
				</div>




				{{Form::close()}}

			</div>
		</div>
	</div>






@endsection