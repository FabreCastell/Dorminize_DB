@extends('clientLayouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Rooms</h2>
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
            <a class="btn btn-info" href="{{ route('clientRooms.show',$room->id) }}">Show</a>
        </td>
    </tr>
    @endforeach
    </table>
    {!! $rooms->render() !!}
@endsection