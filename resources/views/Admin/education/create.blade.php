@extends('Admin.master')

@section('title', 'Education')
@section('sub-title','Add Education')
@section('resume-select', 'active')
@section('education-select', 'active')


@section('right-side-icon')
<li class="dropdown">
	<a href="/dashboard/fact/deleted">
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
				<h6 class="panel-title" style="text-align: center;">Add new Education</h6>
			</div>
			
			<div class="panel-body">

			@include('layouts.include.errors')
			@include('layouts.include.sessionmessage')

				{{Form::open(['url' => '/dashboard/education'  ])}}
				
				<div class="form-group">
					<label for="title">Education Tilte</label>
					<input type="text" name="title" class="form-control" value="{{old('title')}}" required>
				</div>
				<div class="form-group">
					<label for="institute">Institute Name</label>
					<input type="text" name="institute" class="form-control" value="{{old('institute')}}" required>
				</div>

				<div class="form-group">
					<label for="result">Result</label>
					<input type="text" name="result" class="form-control" value="{{old('result')}}" required>
				</div>

				<div class="form-group">
					<label for="passing_year">Passing Year</label>
					<input type="number" name="passing_year" class="form-control" value="{{old('passing_year')}}" required>
				</div>

				<div class="form-group">
					<label for="main_subject">Main Subject</label>
					<input type="text" name="main_subject" class="form-control" value="{{old('main_subject')}}" required>
				</div>

				<div class="form-group">
					<label for="education_board">Education Board</label>
					<input type="text" name="education_board" class="form-control" value="{{old('education_board')}}" required>
				</div>

				<div class="form-group">
					<label for="course_duration">Course Duration</label>
					<input type="text" name="course_duration" class="form-control" value="{{old('course_duration')}}" required>
				</div>


				<div class="form-group">
					<button type="submit" class="btn btn-primary">Add <i class="icon-arrow-right14 position-right"></i></button>
				</div>




				{{Form::close()}}

			</div>
		</div>
	</div>







































@endsection