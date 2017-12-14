<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Number:</strong>
            {!! Form::text('number', null, array('placeholder' => 'number','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Status:</strong>
            {!! Form::text('status', null, array('placeholder' => 'number','class' => 'form-control')) !!}
        </div>
    </div>

   

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>checkin_date:</strong>
            {!! Form::text('checkin_date', null, array('placeholder' => 'date','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Dorm ID:</strong>
            {!! Form::select('dorm_id', $dorms) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Type ID:</strong>
            {!! Form::select('type_id', $roomTypes) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
    
    
    </div>

    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>