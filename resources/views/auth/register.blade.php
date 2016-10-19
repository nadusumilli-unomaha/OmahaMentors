@extends('layouts.app2')

@section('content')
    <div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-4" >
        <div class="panel panel-default ">
            <div class="panel-heading"><strong>Register</strong></div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" id="#adminRegisteration" method="POST" action="{{ url('/register') }}">
                    {{ csrf_field() }}

                    <div class="form-group floating-label-form-group controls {{ $errors->has('role_request') ? ' has-error' : '' }}">
                        <label  for="role_request" class="col-md-4 control-label" style="color:#2c3e50;">Role</label>

                        <div class="col-md-14">
                            <select id="role_request" class="form-control" name="role_request" value="{{ old('role_request') }}" required autofocus>
                                <option value="Employee">Employee</option>
                                <option value="Mentor" selected>Mentor</option>
                            </select>
                            @if ($errors->has('role_request'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('role_request') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group floating-label-form-group controls {{ $errors->has('firstName') ? ' has-error' : '' }}">
                        <label  for="firstName" class="col-md-4 control-label" style="color:#2c3e50;">First Name</label>

                        <div class="col-md-14">
                            <input id="firstName" type="text" class="form-control" name="firstName" placeholder="First Name"  value="{{ old('firstName') }}" required autofocus>

                            @if ($errors->has('firstName'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('firstName') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group floating-label-form-group controls {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label" style="color:#2c3e50#2c3e50;">E-Mail Address</label>

                        <div class="col-md-14">
                            <input id="email" type="email" class="form-control" name="email"  placeholder="E-Mail Address"  value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group floating-label-form-group controls {{ $errors->has('lastName') ? ' has-error' : '' }}">
                        <label for="lastName" class="col-md-4 control-label" style="color:#2c3e50#2c3e50;">Last Name</label>

                        <div class="col-md-14">
                            <input id="lastName" type="lastName" class="form-control" name="lastName"  placeholder="Last Name"  value="{{ old('lastName') }}" required>

                            @if ($errors->has('lastName'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('lastName') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group floating-label-form-group controls {{ $errors->has('address') ? ' has-error' : '' }}">
                        <label for="address" class="col-md-4 control-label" style="color:#2c3e50#2c3e50;">Street Address</label>

                        <div class="col-md-14">
                            <input id="address" type="address" class="form-control" name="address"  placeholder="Street Address"  value="{{ old('address') }}" required>

                            @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group floating-label-form-group controls {{ $errors->has('city') ? ' has-error' : '' }}">
                        <label for="city" class="col-md-4 control-label" style="color:#2c3e50#2c3e50;">City</label>

                        <div class="col-md-14">
                            <input id="city" type="city" class="form-control" name="city"  placeholder="City"  value="{{ old('city') }}" required>

                            @if ($errors->has('city'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group floating-label-form-group controls {{ $errors->has('state') ? ' has-error' : '' }}">
                        <label for="state" class="col-md-4 control-label" style="color:#2c3e50#2c3e50;">State</label>

                        <div class="col-md-14">
                            <input id="state" type="state" class="form-control" name="state"  placeholder="State"  value="{{ old('state') }}" required>

                            @if ($errors->has('state'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('state') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group floating-label-form-group controls {{ $errors->has('zip') ? ' has-error' : '' }}">
                        <label for="zip" class="col-md-4 control-label" style="color:#2c3e50#2c3e50;">Zip Code</label>

                        <div class="col-md-14">
                            <input id="zip" type="zip" class="form-control" name="zip"  placeholder="Zip Code"  value="{{ old('zip') }}" required>

                            @if ($errors->has('zip'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('zip') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group floating-label-form-group controls {{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label for="phone" class="col-md-4 control-label" style="color:#2c3e50#2c3e50;">Phone</label>

                        <div class="col-md-14">
                            <input id="phone" type="phone" class="form-control" name="phone"  placeholder="Phone"  value="{{ old('phone') }}" required>

                            @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
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
                            <button type="submit" class="btn btn-primary " style="margin: 0px 0px 0px 112px;">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
            
@endsection
