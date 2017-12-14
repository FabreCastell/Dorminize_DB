@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Clients</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('clients.create') }}"> Create New Client</a>
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
            <th>Job</th>
            <th>Previous Address</th>
            <th width="280px">Operation</th>
        </tr>
    @foreach ($clients as $client)
    <tr>
        <td>{{ $client->ssn}}</td>
        <td>{{ $client->name}}</td>
        <td>{{ $client->job}}</td>
        <td>{{ $client->previous_address}}</td>
        <td>
            <a class="btn btn-info" href="{{ route('clients.show',$client) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('clients.edit',$client) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['clients.destroy', $client->ssn],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>
    {!! $clients->render() !!}
@endsection