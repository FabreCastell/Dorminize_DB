@extends('clientLayouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>bills</h2>
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
        </td>
    </tr>
    @endforeach
    </table>
    {!! $bills->render() !!}
@endsection