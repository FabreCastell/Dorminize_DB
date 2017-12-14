@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Room Manage</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('rooms.create') }}"> Create New Room</a>
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
            <th>ID</th>
            <th>Number</th>
            <th>Status</th>
            <th>checkin_date</th>
            <th width="280px">Operation</th>
        </tr>
    @foreach ($rooms as $room)
    <tr>
        <td>{{ $room->id}}</td>
        <td>{{ $room->number}}</td>
        <td>{{ $room->status}}</td>
        <td>{{ $room->checkin_date}}</td>
        <td>
            <a class="btn btn-info" href="{{ route('rooms.show',$room) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('rooms.edit',$room) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['rooms.destroy', $room->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>
    
@endsection