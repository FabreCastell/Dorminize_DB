<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Date:</strong>
            {!! Form::date('date', null, array('placeholder' => 'YYYY-MM-DD','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>elec_cost:</strong>
            {!! Form::text('elec_cost', null, array('placeholder' => 'elec_cost','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>water_cost:</strong>
            {!! Form::text('water_cost', null, array('placeholder' => 'water_cost','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Dorm ID:</strong>
            {!! Form::select('dorm_id', $dorms) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>