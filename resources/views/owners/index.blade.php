@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Owners</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('owners.create') }}"> Create New Owner</a>
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
            <th>Name</th>
            <th>Ssn</th>
            
            <th width="280px">Operation</th>
        </tr>
    @foreach ($owners as $owner)
    <tr>
        <td>{{ $owner->name}}</td>
        <td>{{ $owner->ssn}}</td>
       
        <td>
            <a class="btn btn-info" href="{{ route('owners.show',$owner->ssn) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('owners.edit',$owner->ssn) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['owners.destroy', $owner->ssn],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>
    {!! $owners->render() !!}
@endsection