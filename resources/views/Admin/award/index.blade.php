@extends('Admin.master')

@section('title', 'Education')
@section('sub-title','Add Experience')
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


@include('layouts.include.errors')
@include('layouts.include.sessionmessage')

@if(count($allAwards) > 0)
@foreach($allAwards as $data)

<div class="col-md-6">
	<div class="panel panel-default border-grey">
		<div class="panel-heading">
			<h6 class="panel-title"> {{$data->title}} </h6>
			<div class="heading-elements">
				<ul class="icons-list">
	        		<li><a href="#" class="text-muted" data-toggle="modal" data-target="#modal_theme_danger{{$data->id}}"><i class="icon-cross pull-right"></i></a></li>
	        	</ul>
	    	</div>
		<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

		<div class="panel-body">
			<form>
				<div class="form-group">
						<label for="title">Tilte</label>
						<input type="text" name="title" class="form-control" value="{{$data->title}}" disabled>
					</div>

					<div class="form-group">
						<label for="institute">Organization Name</label>
						<input type="text" name="organization" class="form-control" value="{{$data->organization}}" disabled>
					</div>

					<div class="form-group">
						<label for="description">location</label>
						<input type="text" name="location" class="form-control" value="{{$data->location}}" disabled>
					</div>



					<div class="form-group">
						<label for="description">Description</label>

						<textarea disabled id="description" name="description" class="form-control">{{$data->description}}</textarea>
					</div>



					<div class="form-group">
						<label for="description">year</label>
						<input type="number" name="year" class="form-control" value="{{$data->year}}" disabled>
					</div>

					<div style="text-align: center;" class="form-group">
					<a style="text-align: center;" href="/dashboard/award/{{$data->id}}/edit" class="btn btn-primary"><i class=" icon-pencil7"></i> Edit information</a>
				</div>

			</form>
			
		</div>
	</div>
</div>
@endforeach
@else
<p>No Item found</p>
@endif


@foreach($allAwards as $data)

<div id="modal_theme_danger{{$data->id}}" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h6 class="modal-title">Delete Item</h6>
            </div>

            <div class="modal-body">
                <h6 class="text-semibold">Delete</h6>
                <p>Are you sure want to Delete item Which title is <b>{{$data->title}} </b></p>

                <hr>

            </div>

            <div class="modal-footer">

                {{Form::open(['url' => "/dashboard/award/$data->id" ])}}
					{{ method_field('DELETE') }}
					
					<input type="submit" class="btn btn-danger" value="Yes Delete">


                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>



@endforeach



@endsection