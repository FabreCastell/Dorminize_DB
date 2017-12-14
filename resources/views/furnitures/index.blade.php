@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Furnitures</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('furnitures.create') }}"> Create New Furniture</a>
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
            <th>Name</th>
            <th>description</th>
            <th>quantity</th>
            <th>cost</th>
            <th>buy_date</th>
            <th>change_date</th>
            <th>pic_dest</th>
            <th width="280px">Operation</th>
        </tr>
    @foreach ($furnitures as $furniture)
    <tr>
        <td>{{ $furniture->id}}</td>
        <td>{{ $furniture->name}}</td>
        <td>{{ $furniture->description}}</td>
        <td>{{ $furniture->quantity}}</td>
        <td>{{ $furniture->cost}}</td>
        <td>{{ $furniture->buy_date}}</td>
        <td>{{ $furniture->change_date}}</td>
        <td>{{ $furniture->pic_dest}}</td>
        <td>
            <a class="btn btn-info" href="{{ route('furnitures.show',$furniture->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('furnitures.edit',$furniture->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['furnitures.destroy', $furniture->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>
    {!! $furnitures->render() !!}
@endsection