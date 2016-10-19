@extends('layouts.app2')

@section('content')

        </div>
        <div class="col-md-5" style="margin: 0px 0px 0px 335px;">
            <div class="panel panel-default"> 
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group floating-label-form-group controls {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label" style="color:#2c3e50;">E-Mail Address</label>

                        <div class="col-md-14">
                            <input id="email" type="email" class="form-control" name="email"  placeholder="E-Mail Address"  value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group floating-label-form-group controls {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label" style="color:#2c3e50;">Password</label>

                        <div class="col-md-14">
                            <input id="password" type="password" class="form-control" placeholder="Password"  name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group floating-label-form-group controls{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="password-confirm" class="col-md-4 control-label" style="color:#2c3e50;">Confirm Password</label>

                        <div class="col-md-14">
                            <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 text-center">
                        <br/>
                            <button type="submit" class="btn btn-primary" style="margin: 0px 0px 0px 142px;">
                                Reset Password
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
@endsection
