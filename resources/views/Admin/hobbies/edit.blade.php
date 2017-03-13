@extends('Admin.master')

@section('title', 'hobbies')
@section('sub-title','Edit hobbies')
@section('about-select', 'active')
@section('hobbies-select', 'active')

@section('right-side-icon')
<li class="dropdown">
	<a href="/dashboard/hobbies/deleted">
		<i class="icon-trash-alt position-left"></i>
		Trashed Item
	</a>
</li>
@endsection

@section('in-head')
<script type="text/javascript" src="{{asset('assets/js/plugins/forms/selects/select2.min.js')}}"></script>	
<script type="text/javascript" src="{{asset('assets/js/core/app.js')}}"></script>	
<script type="text/javascript" src="{{asset('assets/js/plugins/forms/styling/uniform.min.js')}}"></script>	
<script type="text/javascript" src="{{asset('assets/js/pages/form_layouts.js')}}"></script>	
@endsection


@section('content')


	<div class="col-md-offset-3 col-md-6"> 
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h6 class="panel-title" style="text-align: center;">Edit hobbies</h6>
			</div>
			
			<div class="panel-body">

			@include('layouts.include.errors')
			@include('layouts.include.sessionmessage')

        	{{ Form::open(['url' => '/dashboard/hobbies/'.$data['id'].'/update' ,'files'=>'true']) }}
	
				<div class="form-group">
					{!! Form::label('title', 'Title') !!}
        			{!! Form::text('title', $data['title'], ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('no_of_items', 'Number of items') !!}


					<textarea name="description" class="form-control" rows="10">{{$data['description']}}</textarea>
				</div>

				<div class="form-group">
					<div class="media-body">
						<label for="no_of_item">Current hobbies Image</label>
						
						<div class="row">
							
							<div class="col-md-6">
								@php
				                    $image = "uploads/$data->image";
				                @endphp
	                			<img src="{{url($image)}}" alt="" style="width: 100%">
							</div>
						</div>



						<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
						<input type="file" name="image">

					</div>
				</div>

				<div class="text-right">
					<button type="submit" class="btn btn-primary">Update  <i class="icon-arrow-right14 position-right"></i></button>
				</div>


				{!! Form::close() !!}

			</div>
		</div>
	</div>







































@endsection