@extends('Admin.master')

@section('title', 'Education')
@section('sub-title','Education')
@section('resume-select', 'active')
@section('education-select', 'active')


@section('right-side-icon')
<li class="dropdown">
	<a href="/dashboard/education/deleted">
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



<div class="col-md-12">
<div class="col-md-6 col-md-offset-3">

	<div class="panel panel-default">
		<div class="panel-heading">
			<h5 class="panel-title">Update: {{$data->title}}</h5>
			
		<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
		
		<div class="panel-body">


		@include('layouts.include.errors')
		@include('layouts.include.sessionmessage')

		@php
			$url = "/dashboard/education/$data->id";
		@endphp


		{{ Form::open(['url'=> $url ]) }}

			{{ method_field('PATCH') }}

				
				<div class="form-group">
					<label for="title">Education Tilte</label>
					<input type="text" name="title" class="form-control" value="{{$data->title}}" required>
				</div>

				<div class="form-group">
					<label for="institute">Institute Name</label>
					<input type="text" name="institute" class="form-control" value="{{$data->institute}}" required>
				</div>

				<div class="form-group">
					<label for="result">Result</label>
					<input type="text" name="result" class="form-control" value="{{$data->result}}" required>
				</div>

				<div class="form-group">
					<label for="passing_year">Passing Year</label>
					<input type="number" name="passing_year" class="form-control" value="{{$data->passing_year}}" required>
				</div>

				<div class="form-group">
					<label for="main_subject">Main Subject</label>
					<input type="text" name="main_subject" class="form-control" value="{{$data->main_subject}}" required>
				</div>

				<div class="form-group">
					<label for="education_board">Education Board</label>
					<input type="text" name="education_board" class="form-control" value="{{$data->education_board}}" required>
				</div>

				<div class="form-group">
					<label for="course_duration">Course Duration</label>
					<input type="text" name="course_duration" class="form-control" value="{{$data->course_duration}}" required>
				</div>


				
		
				<div class="form-group" style="text-align: center;">
					<button type="submit" class="btn btn-danger">Update Information <i class="icon-spinner9 position-right"></i></button>
				</div>
			




			{{Form::close()}}

		</div>			
		</div>
	</div>
</div>







































@endsection