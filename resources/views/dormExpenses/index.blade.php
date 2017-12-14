@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>DormExpenses</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('dormExpenses.create') }}"> Create New DormExpense</a>
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
            <th>DATE</th>
            <th>ELEC</th>
            <th>WATER</th>
            
            <th width="280px">Operation</th>
        </tr>
    @foreach ($dormExpenses as $dormExpense)
    <tr>
        <td>{{ $dormExpense->id}}</td>
        <td>{{ $dormExpense->date}}</td>
        <td>{{ $dormExpense->elec_cost}}</td>
        <td>{{ $dormExpense->water_cost}}</td>
        <td>
            <a class="btn btn-info" href="{{ route('dormExpenses.show',$dormExpense->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('dormExpenses.edit',$dormExpense->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['dormExpenses.destroy', $dormExpense->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>
    {!! $dormExpenses->render() !!}
@endsection