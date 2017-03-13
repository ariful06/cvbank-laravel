@extends('Admin.master')

@section('sub-title', 'Add Experience')

@section('content')
	<!-- <table border="2"></table> -->

	<table border="2" class="table">
		<tr>
			<td>Designation</td>
			<td>Company name</td>
			<td>Action</td>
		</tr>


		@foreach($allExperience as $data)
		<tr>
			<td>
				{{$data->designation}}
				
			</td>
			<td>
				{{$data->company_name}}
			</td>

			<td>
				<a href="{{url('/dashboard/experience/'.$data->id.'/details')}}">Details</a>
				<a href="{{url('/dashboard/experience/'.$data->id.'/edit')}}">Edit</a>
			{!! Form::open(['url'=>'/dashboard/experience/'.$data->id.'/delete']) !!}
				{!! Form::submit('Delete') !!}
				{!! Form::close() !!}
			</td>
		</tr>
		@endforeach
	</table>
	{{ $allExperience->links() }}
@endsection