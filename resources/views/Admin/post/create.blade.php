@extends('Admin.master')

@section('title', 'Post')
@section('sub-title','Add Post')
@section('post-select', 'active')


@section('right-side-icon')
<li class="dropdown">
	<a href="/dashboard/post/deleted">
		<i class="icon-trash-alt position-left"></i>
		Trashed Item
	</a>
</li>
@endsection


@section('content')


	<div class="col-md-offset-3 col-md-6"> 
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h6 class="panel-title" style="text-align: center;">Add a Post</h6>
			</div>
			
			<div class="panel-body">

			@include('layouts.include.errors')
			@include('layouts.include.sessionmessage')

				{{Form::open(['url' => '/dashboard/post'  ])}}
				
				<div class="form-group">
					<label for="designation">Title</label>
					<input type="text" name="title" class="form-control" value="{{old('title')}}" required>
				</div>

				<div class="form-group">
					<label for="company_name">Description</label>

					<textarea name="description" class="form-control" rows="15" required>{{old('description')}}</textarea>
				</div>

					
			




				<div class="form-group" style="text-align: center;">
					<button type="submit" class="btn btn-primary">Add <i class=" icon-plus-circle2 position-right"></i></button>
				</div>




				{{Form::close()}}

			</div>
		</div>
	</div>





@endsection