@extends('Admin.master')

@section('sub-title', 'Add Experience')


@section('content')

	<div class="panel panel-flat">
	
		<div class="panel-heading">
			<h6 class="panel-title">Add A Experience</h6>
		</div>
		
		<div class="panel-body">

			<div class="col-md-offset-3 col-md-6">

				{!! Form::open(['url' => '/dashboard/experience/store', 'class' =>'form-horizontal'   ]) !!}


				<div class="form-group">
				    {!! Form::label('Designation') !!}
				    {!! Form::text('designation', null, 
				        array('required', 
				              'class'=>'form-control', 
				              'placeholder'=>'Your Position')) !!}
				</div>

				<div class="form-group">
				    {!! Form::label('Company Name') !!}
				    {!! Form::text('company_name', null, 
				        array('required', 
				              'class'=>'form-control', 
				              'placeholder'=>'Your Company name')) !!}
				</div>

				<div class="form-group">
				    {!! Form::label('Start Date') !!}
				    {!! Form::date('start_date', null, 
				        array('required', 
				              'class'=>'form-control', 
				              'placeholder'=>'Your Company name')) !!}
				</div>

				<div class="form-group">
				    {!! Form::label('End Date') !!}
				    {!! Form::text('end_date', null, 
				        array('required', 
				              'class'=>'form-control', 
				              'placeholder'=>'leave blank if running')) !!}
				</div>

				<div class="form-group">
				    {!! Form::label('Company Location') !!}
				    {!! Form::text('company_location', null, 
				        array('required', 
				              'class'=>'form-control', 
				              'placeholder'=>'example: NY, USA')) !!}
				</div>





				<div class="form-group">
				    {!! Form::submit('Add Experience', 
				      array('class'=>'btn btn-primary')) !!}
				</div>
				{!! Form::close() !!}

			</div>	
		
		</div>
	</div>
@endsection