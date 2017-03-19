@extends('Admin.master')




@section('title', 'Post')
@section('sub-title','Trashed Post')
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


@include('layouts.include.errors')
@include('layouts.include.sessionmessage')

@if(count($allPosts) > 0)
@foreach($allPosts as $data)

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
						<label for="title">Title</label>
						<input type="text" name="designation" class="form-control" value="{{$data->title}}" disabled>
					</div>
					

					<div class="form-group">
						<label for="description">Company Name</label>
						<textarea name="description" rows="15" class="form-control" disabled>{{$data->description}}</textarea>
					</div>


					<div style="text-align: center;" class="form-group">

					
						<a class="btn btn-primary" href="/dashboard/post/{{$data->id}}/restore"><i class="icon-add-to-list position-right"></i> Restore Item</a>
					</div>

			</form>
			
		</div>
	</div>
</div>
@endforeach
@else
<p>No Item found</p>
@endif


@foreach($allPosts as $data)



<div id="modal_theme_danger{{$data->id}}" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h6 class="modal-title">Parmanent Delete</h6>
            </div>

            <div class="modal-body">
                <h6 class="text-semibold">Delete Information</h6>
                <p>Are you sure want to Parmanent delete item Which Title is <b>{{$data->title}} </b></p>

                <hr>

                
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>

                <a href="/dashboard/post/{{$data->id}}/pdelete/" class="btn btn-danger">Yes Delete</a>
            </div>
        </div>
    </div>
</div>




@endforeach



@endsection