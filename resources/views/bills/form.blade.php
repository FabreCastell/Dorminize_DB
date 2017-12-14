<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Electricity Bill(unit):</strong>
            {!! Form::text('elec_unit', null, array('placeholder' => 'Electricity Bill(unit)','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Water Bill(unit):</strong>
            {!! Form::text('water_unit', null, array('placeholder' => 'Water Bill(unit)','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Status:</strong>
            {!! Form::select('status', array('paid' => 'จ่ายแล้ว', 'unpaid' => 'ยังไม่ได้จ่าย'), 'unpaid') !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Date:</strong>
            {!! Form::date('date', null, array('placeholder' => 'YYYY-MM-DD','class' => 'form-control')) !!}
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
            <strong>Room ID:</strong>
            {!! Form::select('room_id', $rooms) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Client SSN:</strong>
            {!! Form::select('ssn', $clients) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>