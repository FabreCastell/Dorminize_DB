@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>RoomTypes</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('roomTypes.create') }}"> Create New RoomType</a>
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
            <th>Size</th>
            <th>Deposit</th>
            <th>Rental Price</th>
            <th>Pic Dest</th>
            <th width="280px">Operation</th>
        </tr>
    @foreach ($roomTypes as $roomType)
    <tr>
        <td>{{ $roomType->id}}</td>
        <td>{{ $roomType->name}}</td>
        <td>{{ $roomType->size}}</td>
        <td>{{ $roomType->deposit}}</td>
        <td>{{ $roomType->rental_price}}</td>
        <td>{{ $roomType->pic_dest}}</td>
        <td>
            <a class="btn btn-info" href="{{ route('roomTypes.show',$roomType->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('roomTypes.edit',$roomType->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['roomTypes.destroy', $roomType->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>
    {!! $roomTypes->render() !!}
@endsection