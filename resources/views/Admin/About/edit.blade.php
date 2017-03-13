@extends('Admin.master')

@section('title', 'About')
@section('sub-title','About')
@section('about-select', 'active')


@section('content')





	<div class="col-md-offset-3 col-md-6"> 
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h6 class="panel-title" style="text-align: center;">Information</h6>
			</div>
			
			<div class="panel-body">

			@include('layouts.include.errors')
			@include('layouts.include.sessionmessage')

        	{{ Form::open(['url' => '/dashboard/about/update', 'class'=> 'form-horizontal']) }}
				
				
				<div class="form-group">
					<label fo class="control-label col-lg-2">I am a: </label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="title" value="{{$data->title}}">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-lg-2">Phone</label>
					<div class="col-lg-10">
						<input type="number" class="form-control" value="{{$data->phone}}" name="phone">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-lg-2">Bio</label>
					<div class="col-lg-10">
						<textarea name="bio" cols="30" rows="10" class="form-control">{{$data->bio}}</textarea>
					</div>
				</div>


				<div class="form-group">
					<div class="text-center">
						<!-- <a href="/dashboard/about/edit" class="btn btn-primary">Edit Information</a> -->
						<input type="submit" class="btn btn-primary" value="Save Change">
					</div>
				</div>

			




				{{Form::close()}}

			</div>
		</div>
	</div>


@endsection