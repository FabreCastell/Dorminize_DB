@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Staffs List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('staffs.create')}}"> Create New Staff</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>SSN</th>
            <th>Name</th>
            <th>Position</th>
            <th>Gender</th>
            <th>Work Hour</th>
            <th>PhoneNumber</th>
            <th>Salary</th>
            
            <th width="280px">Operation</th>
        </tr>
    @foreach ($staffs as $staff)
    <tr>
        <td>{{ $staff->ssn}}</td>
        <td>{{ $staff->name}}</td>
        <td>{{ $staff->position}}</td>
        <td>{{ $staff->gender}}</td>
        <td>{{ $staff->work_hour}}</td>
        <td>{{ $staff->phone_number}}</td>
        <td>{{ $staff->salary}}</td>
        <td>
            <a class="btn btn-info" href="{{ route('staffs.show',$staff) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('staffs.edit',$staff) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['staffs.destroy', $staff],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>
@endsection