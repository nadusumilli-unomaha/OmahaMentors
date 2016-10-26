@extends('layouts.app2')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-4">
        <a class="btn btn-primary" style="margin: 10px 10px 10px 900px;" href="{{ URL::previous() }}">Go Back</a>
        <div class="panel panel-default ">
            <div class="panel-heading"><strong>New Student</strong></div>
            <div class="panel-body">
		        {!! Form::open(['url' => 'students', 'class'=>'form-horizontal', 'role'=>'form']) !!}
		        <div style="color:black;">
		        	{!! Form::label('user_id', 'Mentor Name:',['class'=>'col-md-4 control-label']) !!}
                	{!! Form::select('user_id', $users) !!}
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
			            {!! Form::text('state',null,['class'=>'form-control','placeholder'=>'State','data-validation-required-message']) !!}
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
		        <div class="form-group floating-label-form-group controls {{ $errors->has('school') ? ' has-error has-feedback' : '' }}">
		            {!! Form::label('school', 'School:',['class'=>'col-md-4 control-label']) !!}
		            <div class="col-md-14">
			            {!! Form::text('school',null,['class'=>'form-control','placeholder'=>'School','data-validation-required-message']) !!}
			            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
			            @if ($errors->has('school'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('school') }}</strong>
			                </span>
			            @endif
		            </div>
		        </div>
		        <div class="form-group floating-label-form-group controls {{ $errors->has('dob') ? ' has-error has-feedback' : '' }}">
		            {!! Form::label('dob', 'Date Of Birth:',['class'=>'col-md-4 control-label']) !!}
		            <div class="col-md-14">
			            {!! Form::text('dob',null,['class'=>'form-control','placeholder'=>'Date Of Birth','data-validation-required-message']) !!}
			            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
			            @if ($errors->has('dob'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('dob') }}</strong>
			                </span>
			            @endif
		            </div>
		        </div>
		        <div class="form-group floating-label-form-group controls {{ $errors->has('gender') ? ' has-error has-feedback' : '' }}">
		            {!! Form::label('gender', 'Gender:',['class'=>'col-md-4 control-label']) !!}
		            <div class="col-md-14">
			            {!! Form::text('gender',null,['class'=>'form-control','placeholder'=>'Gender','data-validation-required-message']) !!}
			            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
			            @if ($errors->has('gender'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('gender') }}</strong>
			                </span>
			            @endif
		            </div>
		        </div>
		        <div class="form-group">
                        <div class="col-md-6 text-center " style="margin: 0px 0px 0px 132px;">
                        <br/>
		            		{!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
                        </div>
		        </div>
		        {!! Form::close() !!}
            </div>
        </div>
    </div>
    </div>
@endsection