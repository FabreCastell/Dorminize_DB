@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ssn') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">SSN</label>

                            <div class="col-md-6">
                                <input id="ssn" type="text" class="form-control" name="ssn" value="{{ old('ssn') }}" required autofocus>

                                @if ($errors->has('ssn'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ssn') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <script type="text/javascript">
                            var status= "";
                            function showfield(){
                                var status1 = document.getElementById("heroesandgeneral").innerHTML;
                                document.getElementById("heroesandgeneral").innerHTML = status;
                                status = status1;
                            }
                        </script>

                        <div class="form-group">
                            {!! Form::label('status', 'Status', ['class' => 'col-md-4 control-label'] )  !!}
                            <div class="col-md-6">
                                <select id="status" name="status" class="form-control" onchange="showfield()">
                                    <option value="owner">owner</option>
                                    <option value="client" selected="selected">client</option>
                                </select>
                            </div>
                        </div>

                        <div id="heroesandgeneral" class="form-group">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="job" class="col-md-4 control-label">Job</label>

                                <div class="col-md-6">
                                    <input id="job" type="text" class="form-control" name="job" value="{{ old('job') }}" required autofocus>

                                    @if ($errors->has('job'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('job') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="previous_address" class="col-md-4 control-label">Previous Address</label>

                                <div class="col-md-6">
                                    <input id="previous_address" type="text" class="form-control" name="previous_address" value="{{ old('previous_address') }}" required autofocus>

                                    @if ($errors->has('previous_address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('previous_address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
