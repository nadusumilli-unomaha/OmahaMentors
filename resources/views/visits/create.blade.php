@extends('layouts.app2')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-4">
        <a class="btn btn-primary" style="margin: 10px 10px 10px 900px;" href="{{ URL::previous() }}">Go Back</a>
        <div class="panel panel-default ">
            <div class="panel-heading"><strong>New Visit</strong></div>
            <div class="panel-body">
		        {!! Form::open(['url' => 'visits', 'class'=>'form-horizontal', 'role'=>'form']) !!}
		        <div style="color:black; margin:10px 0px 0px 0px;">
		        	{!! Form::label('student_id', 'Student Name:',['class'=>'col-md-4 control-label']) !!}
                	{!! Form::select('student_id', $students) !!}
                </div>
		        <div style="color:black; margin:10px 0px 0px 0px;">
		        	{!! Form::label('user_id', 'User Name:',['class'=>'col-md-4 control-label']) !!}
                	{!! Form::select('user_id', $mentors) !!}
                </div>
		        <div class="form-group floating-label-form-group controls {{ $errors->has('Date') ? ' has-error has-feedback' : '' }}">
		            {!! Form::label('Date', 'Date:',['class'=>'col-md-4 control-label']) !!}
		            <div class="col-md-14">
			            {!! Form::text('Date',null,['class'=>'form-control','placeholder'=>'Date','data-validation-required-message']) !!}
			            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
			            @if ($errors->has('Date'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('Date') }}</strong>
			                </span>
			            @endif
		            </div>
		        </div>
		        <div class="form-group floating-label-form-group controls {{ $errors->has('check') ? ' has-error has-feedback' : '' }}">
		            {!! Form::label('check', 'Presence:',['class'=>'col-md-4 control-label']) !!}
		            <div class="col-md-14">
			            {!! Form::text('check','Absent',['class'=>'form-control','readonly','placeholder'=>'Presence','data-validation-required-message']) !!}
			            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
			            @if ($errors->has('check'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('check') }}</strong>
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