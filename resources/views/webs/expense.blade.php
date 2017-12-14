@extends('layouts.default')
 
@section('content')
@php ($elec_expense = 0)
@php ($water_expense = 0)
@foreach ($dorm as $dorms)
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Dorm</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ID:</strong>
                {{ $dorms->id}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $dorms->name}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>room id:</strong>
                {{ $dorms->room_id}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>water unit:</strong>
                {{ $dorms->water_unit}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>elec unit:</strong>
                {{ $dorms->elec_unit}}
            </div>
        </div>
    </div>
@php($elec_expense = $elec_expense+($dorms->elec_unit*$dorms->elec_cost))
@php($water_expense = $water_expense+($dorms->water_unit*$dorms->water_cost))
    @endforeach
    <div class="form-group">
        <strong>get elec from client:</strong>
        {{$elec_expense}}
    </div>
    <div class="form-group">
        <strong>get water from client:</strong>
        {{$water_expense}}
    </div>
    <div class="form-group">
        <strong>elec balance:</strong>
        {{$dorm[0]->elec_cost-$elec_expense}}
    </div>
    <div class="form-group">
        <strong>water balance:</strong>
        {{$dorm[0]->water_cost-$water_expense}}
    </div>
@endsection