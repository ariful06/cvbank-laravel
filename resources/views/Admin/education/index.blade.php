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

@foreach($allEducation as $data)
<div class="col-md-6">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5 class="panel-title">{{$data->title}}</h5>
			<div class="heading-elements">
				<ul class="icons-list">
            		
            		<a href="#" class="text-muted" data-toggle="modal" data-target="#modal_theme_danger{{$data->id}}"><i class="icon-cross pull-right"></i></a>

            		<a href="/dashboard/education/{{$data->id}}/edit" class="text-muted"><i class="icon-pencil7 pull-right"></i></a>

            	</ul>
        	</div>
		<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
		
		<div class="panel-body">


			<form class="form-horizontal">
				
				<div class="form-group">
					<label for="title">Education Tilte</label>
					<input type="text" name="title" class="form-control" value="{{$data->title}}" readonly>
				</div>
				<div class="form-group">
					<label for="institute">Institute Name</label>
					<input type="text" name="institute" class="form-control" value="{{$data->institute}}" readonly>
				</div>

				<div class="form-group">
					<label for="result">Result</label>
					<input type="text" name="result" class="form-control" value="{{$data->result}}" readonly>
				</div>

				<div class="form-group">
					<label for="passing_year">Passing Year</label>
					<input type="number" name="passing_year" class="form-control" value="{{$data->passing_year}}" readonly>
				</div>

				<div class="form-group">
					<label for="main_subject">Main Subject</label>
					<input type="text" name="main_subject" class="form-control" value="{{$data->main_subject}}" readonly>
				</div>

				<div class="form-group">
					<label for="education_board">Education Board</label>
					<input type="text" name="education_board" class="form-control" value="{{$data->education_board}}" readonly>
				</div>

				<div class="form-group">
					<label for="course_duration">Course Duration</label>
					<input type="text" name="course_duration" class="form-control" value="{{$data->course_duration}}" readonly>
				</div>


				<div style="text-align: center;" class="form-group">
					<a style="text-align: center;" href="/dashboard/education/{{$data->id}}/edit" class="btn btn-primary"><i class=" icon-pencil7"></i> Edit information</a>
				</div>


		


			




			</form>
		</div>
	</div>
</div>
@endforeach





@foreach($allEducation as $data)
    <div id="modal_theme_danger{{$data->id}}" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h6 class="modal-title">Delete Education Record</h6>
                </div>

                <div class="modal-body">
                    <h6 class="text-semibold">Delete Fact</h6>
                    <p>Are you sure want to delte this Education Which tile is <b>{{$data->title}} </b></p>
                    <hr>

                    
                </div>

                <div class="modal-footer">
 
                    {{Form::open(['url' =>  "/dashboard/education/"  ])}}
                    	{{ method_field('DELETE') }}
						<input type="submit" class="btn btn-danger" value="Delete">
                    {{Form::close()}}
                    
                </div>
            </div>
        </div>
    </div>
@endforeach





























@endsection