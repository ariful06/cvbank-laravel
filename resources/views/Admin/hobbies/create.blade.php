@extends('Admin.master')

@section('title', 'Hobbies')
@section('sub-title','Add Fact')
@section('about-select', 'active')
@section('hobbies-select', 'active')


@section('right-side-icon')
<li class="dropdown">
	<a href="/dashboard/fact/deleted">
		<i class="icon-trash-alt position-left"></i>
		Trashed Item
	</a>
</li>
@endsection


@section('in-head')
<script type="text/javascript" src="{{asset('assets/js/plugins/forms/selects/select2.min.js')}}"></script>	
<script type="text/javascript" src="{{asset('assets/js/plugins/forms/styling/uniform.min.js')}}"></script>	
<script type="text/javascript" src="{{asset('assets/js/core/app.js')}}"></script>	
<script type="text/javascript" src="{{asset('assets/js/pages/form_layouts.js')}}"></script>	

<script type="text/javascript">

</script>
@endsection



@section('content')




	<div class="col-md-offset-3 col-md-6"> 
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h6 class="panel-title" style="text-align: center;">Add New Hobbies</h6>
			</div>
			
			<div class="panel-body">

			@include('layouts.include.errors')
			@include('layouts.include.sessionmessage')

				{{Form::open(['url' => '/dashboard/hobbies/store', 'files' => 'true' ])}}
				
				<div class="form-group">
					<label for="title">Hobbies Tilte</label>
					<input type="text" name="title" class="form-control" value="{{old('title')}}">
				</div>

				<div class="form-group">
					<label for="no_of_items">Description </label>
					<textarea rows="5" name="description" class="form-control" value="{{old('description')}}"></textarea>
					
				</div>


				<div class="form-group">
					<label>Hobbies Image:</label>
					
					<div class="uploader bg-warning"><input type="file" class="file-styled" name="image" id="iii" onchange="fnc()"><span class="filename" style="user-select: none;">No file selected</span><span class="action" style="user-select: none;"><i class="icon-googleplus5"></i></span></div>
					<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
				</div>


				<div class="form-group">
					<button type="submit" class="btn btn-primary">Add <i class="icon-plus-circle2 position-right"></i></button>
				</div>




				{{Form::close()}}

			</div>
		</div>
	</div>







































@endsection