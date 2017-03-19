@extends('Admin.master')


@section('title', 'Post')
@section('sub-title','Edit Post')
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
        <h6 class="panel-title" style="text-align: center;">Edit Post Information</h6>
      </div>
      
      <div class="panel-body">

      @include('layouts.include.errors')
      @include('layouts.include.sessionmessage')

        {{Form::open(['url' => "/dashboard/post/$data->id" ])}}

        {{ method_field('PATCH') }}
        
          <div class="form-group">
            <label for="institute">Tile</label>
            <input type="text" name="title" class="form-control" value="{{$data->title}}" required>
          </div>
          

          <div class="form-group">
            <label for="company_name">Company Name</label>
            <textarea name="description" rows="15" class="form-control">{{$data->description}}</textarea>
          </div>


          <div class="form-group" style="text-align: center;">
            <button type="submit" class="btn btn-danger">Update Information <i class="icon-spinner9 position-right"></i></button>
          </div>




        {{Form::close()}}

      </div>
    </div>
  </div>






@endsection