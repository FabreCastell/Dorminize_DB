@extends('layouts.default')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Bill</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('bills.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::model($bill, ['method' => 'PATCH','route' => ['bills.update', $bill->invoice_number]]) !!}
        @include('bills.form')
    {!! Form::close() !!}
@endsection