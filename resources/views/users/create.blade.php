@extends('layouts.app2')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-4">
        <a class="btn btn-primary" style="margin: 10px 10px 10px 900px;" href="{{ action('HomeController@afterLogin') }}">Go Back</a>
        <div class="panel panel-default ">
            <div class="panel-heading"><strong>New User</strong></div>
            <div class="panel-body">
                {!! Form::open(['url' => 'users', 'class'=>'user form-horizontal', 'role'=>'form']) !!}
                <div style="color:black;">
                    {!! Form::label('role_request', 'Role:',['class'=>'col-md-4 control-label']) !!}
                    {!! Form::select('role_request', ['Mentor'=>'Mentor','Employee']) !!}
                </div>
                <div class="form-group floating-label-form-group controls {{ $errors->has('lastName') ? ' has-error has-feedback' : '' }}">
                    {!! Form::label('lastName', 'Last Name:',['class'=>'col-md-4 control-label']) !!}
                    <div class="col-md-14">
                        {!! Form::text('lastName',null,['class'=>'form-control','placeholder'=>'Last Name','data-validation-required-message']) !!}
                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                        @if ($errors->has('lastName'))
                            <span class="help-block">
                                <strong>{{ $errors->first('lastName') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group floating-label-form-group controls {{ $errors->has('firstName') ? ' has-error has-feedback' : '' }}">
                    {!! Form::label('firstName', 'First Name',['class'=>'col-md-4 control-label']) !!}
                    <div class="col-md-14">
                        {!! Form::text('firstName',null,['class'=>'form-control','placeholder'=>'First Name','data-validation-required-message']) !!}
                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                        @if ($errors->has('firstName'))
                            <span class="help-block">
                                <strong>{{ $errors->first('firstName') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group floating-label-form-group controls {{ $errors->has('email') ? ' has-error has-feedback' : '' }}">
                    {!! Form::label('email', 'Primary Email:',['class'=>'col-md-4 control-label']) !!}
                    <div class="col-md-14">
                        {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'Primary Email','data-validation-required-message']) !!}
                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group floating-label-form-group controls {{ $errors->has('address') ? ' has-error has-feedback' : '' }}">
                    {!! Form::label('address', 'Street Address:',['class'=>'col-md-4 control-label']) !!}
                    <div class="col-md-14">
                        {!! Form::text('address',null,['class'=>'form-control','placeholder'=>'Street Address','data-validation-required-message'] ) !!}
                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                        @if ($errors->has('address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group floating-label-form-group controls {{ $errors->has('city') ? ' has-error has-feedback' : '' }}">
                    {!! Form::label('city', 'City:',['class'=>'col-md-4 control-label']) !!}
                    <div class="col-md-14">
                    {!! Form::text('city',null,['class'=>'form-control','placeholder'=>'City','data-validation-required-message']) !!}
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                    @if ($errors->has('city'))
                        <span class="help-block">
                            <strong>{{ $errors->first('city') }}</strong>
                        </span>
                    @endif
                    </div>
                </div>
                <div class="form-group floating-label-form-group controls {{ $errors->has('state') ? ' has-error has-feedback' : '' }}">
                    {!! Form::label('state', 'State:',['class'=>'col-md-4 control-label']) !!}
                    <div class="col-md-14">
                        {{ Form::select('state', [
                            'Alabama'=> 'Alabama',
                            'Alaska'=> 'Alaska',
                            'Arizona'=> 'Arizona',
                            'Arkansas'=> 'Arkansas',
                            'California'=> 'California',
                            'Colorado'=> 'Colorado',
                            'Connecticut' =>'Connecticut',
                            'Delaware'=> 'Delaware',
                            'Florida'=> 'Florida',
                            'Georgia'=> 'Georgia',
                            'Hawaii'=> 'Hawaii',
                            'Idaho'=> 'Idaho',
                            'Illinois'=> 'Illinois',
                            'Indiana'=> 'Indiana',
                            'Iowa'=> 'Iowa',
                            'Kansas'=> 'Kansas',
                            'Kentucky'=> 'Kentucky',
                            'Louisiana'=> 'Louisiana',
                            'Maine'=> 'Maine',
                            'Maryland'=> 'Maryland',
                            'Massachusetts'=> 'Massachusetts',
                            'Michigan' =>'Michigan',
                            'Minnesota' => 'Minnesota',
                            'Mississippi'=> 'Mississippi',
                            'Missouri'=> 'Missouri',
                            'Montana'=> 'Montana',
                            'Nebraska'=> 'Nebraska',
                            'Nevada'=> 'Nevada',
                            'New Hampshire'=> 'New Hampshire',
                            'New Jersey'=> 'New Jersey',
                            'New Mexico'=> 'New Mexico',
                            'New York'=> 'New York',
                            'North Carolina'=> 'North Carolina',
                            'North Dakota'=> 'North Dakota',
                            'Ohio'=> 'Ohio',
                            'Oklahoma'=> 'Oklahoma',
                            'Oregon'=> 'Oregon',
                            'Pennsylvania'=> 'Pennsylvania',
                            'Rhode Island'=> 'Rhode Island',
                            'South Carolina'=> 'South Carolina',
                            'South Dakota'=> 'South Dakota',
                            'Tennessee'=> 'Tennessee',
                            'Texas'=> 'Texas',
                            'Utah' =>'Utah',
                            'Vermont'=> 'Vermont',
                            'Virginia'=> 'Virginia',
                            'Washington'=> 'Washington',
                            'West Virginia'=> 'West Virginia',
                            'Wisconsin'=> 'Wisconsin',
                            'Wyoming'=> 'Wyoming'],
                            '',
                           ['class'=>'form-control','style'=>'color:black;','placeholder'=>'State','data-validation-required-message']
                        ) }}
                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                        @if ($errors->has('state'))
                            <span class="help-block">
                                <strong>{{ $errors->first('state') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group floating-label-form-group controls {{ $errors->has('zip') ? ' has-error has-feedback' : '' }}">
                    {!! Form::label('zip', 'Zip:',['class'=>'col-md-4 control-label']) !!}
                    <div class="col-md-14">
                        {!! Form::text('zip',null,['class'=>'form-control','placeholder'=>'Zip','data-validation-required-message']) !!}
                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                        @if ($errors->has('zip'))
                            <span class="help-block">
                                <strong>{{ $errors->first('zip') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group floating-label-form-group controls {{ $errors->has('phone') ? ' has-error has-feedback' : '' }}">
                    {!! Form::label('phone', 'Phone:',['class'=>'col-md-4 control-label']) !!}
                    <div class="col-md-14">
                        {!! Form::text('phone',null,['class'=>'form-control','placeholder'=>'Phone','data-validation-required-message']) !!}
                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                        @if ($errors->has('phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group floating-label-form-group controls {{ $errors->has('password') ? ' has-error has-feedback' : '' }}">
                    {!! Form::label('password', 'Password:',['class'=>'col-md-4 control-label']) !!}
                    <div class="col-md-14">
                        {!! Form::password('password',['class'=>'form-control','type'=>'password','id'=>'txtNewPassword','placeholder'=>'Password','data-validation-required-message']) !!}
                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group floating-label-form-group controls {{ $errors->has('password-confirm') ? ' has-error has-feedback' : '' }}">
                    {!! Form::label('password-confirm', 'Confirm Password:',['class'=>'col-md-4 control-label']) !!}
                    <div class="col-md-14">
                        {!! Form::password('password-confirm',['class'=>'form-control','type'=>'password','id'=>'txtConfirmPassword','onchange'=>'checkPasswordMatch()','placeholder'=>'Confirm Password','data-validation-required-message']) !!}
                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                        @if ($errors->has('password-confirm'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password-confirm') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div style="color:red;" class="form-group registrationFormAlert" id="divCheckPasswordMatch"></div>
                <div class="form-group">
                        <div class="col-md-6 text-center " style="margin: 0px 0px 0px 132px;">
                        <br/>
                            {!! Form::button('<span style="margin: 3px 5px 0px 0px;" class="glyphicon glyphicon-floppy-disk"></span>Save', ['class' => 'btn btn-primary form-control','type'=>'submit']) !!}
                        </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    </div>
@endsection