@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Manage Dorm</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('dorms.create') }}"> Create New Dorm</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
        <tr>
            <th>Name</th>
            <th>Location</th>
            <th>Building Amount</th>
            <th>Room Amount</th>
        
            <th width="280px">Operation</th>
        </tr>
    @foreach ($dorms as $dorm)
    <tr>
        <td>{{ $dorm->name}}</td>
        <td>{{ $dorm->location}}</td>
        <td>{{ $dorm->building_amt}}</td>
        <td>{{ $dorm->room_amt}}</td>


        <td>
            <a class="btn btn-info" href="{{ route('dorms.show',$dorm->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('dorms.edit',$dorm->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['dorms.destroy', $dorm->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>
    
@endsection

