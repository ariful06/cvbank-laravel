@extends('Admin.master')

@section('title', 'Fact')
@section('sub-title','My Deleted Fact')
@section('about-select', 'active')
@section('fact-select', 'active')



@section('right-side-icon')
<li class="dropdown">
    <a href="/dashboard/fact/deleted">
        <i class="icon-trash-alt position-left"></i>
        Trashed Item
    </a>
</li>
@endsection



@section('content')


@include('layouts.include.sessionmessage')


@if(count($allFacts) > 0)

    @foreach($allFacts as $data)
    <div class="col-lg-4 col-sm-6">
        <div class="thumbnail">
            <div class="thumb">
                @php
                $image =  "uploads/$data->image" ;

                @endphp
                <img src="{{url($image)}}" alt="">

                <div class="caption-overflow">
                    <span>
                        <a href="#" data-popup="lightbox" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>

                        <a href="#" class="btn border-white text-white btn-flat btn-icon btn-rounded ml-5"><i class="icon-link2"></i></a>

                    </span>
                </div>
            </div>
            
            <!-- ACTION button -->
            <div class="caption">
                <h6 class="no-margin-top text-semibold"><a href="#" class="text-default">{{$data->title}} </a>
                
                <a href="#" class="text-muted pull-right" data-toggle="modal" data-target="#modal_theme_restore{{$data->id}}"><span class="label label-success pull-right">RESTORE</span></a>
                
                
                <a href="#" class="text-muted" data-toggle="modal" data-target="#modal_theme_danger{{$data->id}}"><span class="label label-danger pull-right">DELETE</span></a>

                </h6>






                Item No. {{$data->no_of_items}}
            </div>
        </div>
    </div>
    @endforeach
@else
    <p>No Record Found</p>

@endif


@foreach($allFacts as $data)
    <div id="modal_theme_danger{{$data->id}}" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h6 class="modal-title">Delete Fact</h6>
                </div>

                <div class="modal-body">
                    <h6 class="text-semibold">Delete Fact</h6>
                    <p>Are you sure want to delte this fact Which tile is <b>{{$data->title}} </b></p>

                    <hr>

                    
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>

                    <!-- <button type="button" class="btn btn-danger">Save changes</button> -->
                    <a href="/dashboard/fact/pdelete/{{$data->id}}" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
@endforeach


@foreach($allFacts as $data)
    <div id="modal_theme_restore{{$data->id}}" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h6 class="modal-title">Restore Fact</h6>
                </div>

                <div class="modal-body">
                    <h6 class="text-semibold">Restore Fact</h6>
                    <p>Are you want to restore item which title: <b>{{$data->title}} </b></p>

                    <hr>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>

                    <!-- <button type="button" class="btn btn-danger">Save changes</button> -->
                    <a href="/dashboard/fact/restore/{{$data->id}}" class="btn btn-success">Restore</a>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection