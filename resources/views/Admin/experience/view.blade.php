@extends('Admin.master')

@section('sub-title', 'Details of Experience')

@section('content')
    <!-- <table border="2"></table> -->

    <table border="2" class="table">
        <tr>
            <td>Designation</td>
            <td>Company name</td>
            <td>Start Date</td>
            <td>End Date</td>
            <td>Company location</td>
            <td>Action</td>
        </tr>
            <tr>
                <td>
                    {{$data->designation}}
                </td>
                <td>
                    {{$data->company_name}}
                </td>
                <td>
                    {{$data->start_date}}
                </td>
                <td>
                    {{$data->end_date}}
                </td>
                <td>
                    {{$data->company_location}}
                </td>

                <td>
                    <a href="{{url('/dashboard/experience/'.$data->id.'/details')}}">Details</a>
                    <a href="{{url('/dashboard/experience/'.$data->id.'/edit')}}">Edit</a>
                    {!! Form::open(['url'=>'/dashboard/experience/'.$data->id.'/delete']) !!}
                    {!! Form::submit('Delete') !!}
                    {!! Form::close() !!}
                </td>
            </tr>
    </table>
@endsection