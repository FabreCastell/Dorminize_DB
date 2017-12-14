@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>bills </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('bills.create') }}"> Create New Bill</a>
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
            <th>Invoice Number</th>
            <th>Electricity Bill(unit)</th>
            <th>Water Bill(unit)</th>
            <th>Date</th>
            <th width="280px">Operation</th>
        </tr>
    @foreach ($bills as $bill)
    <tr>
        <td>{{ $bill->invoice_number}}</td>
        <td>{{ $bill->elec_unit}}</td>
        <td>{{ $bill->water_unit}}</td>
        <td>{{ $bill->date}}</td>
        <td>
            <a class="btn btn-info" href="{{ route('bills.show',$bill->invoice_number) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('bills.edit',$bill->invoice_number) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['bills.destroy', $bill->invoice_number],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>
    {!! $bills->render() !!}
@endsection