@extends('layouts.app2')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-4">
        <a class="btn btn-primary" style="margin: 0px 0px 0px 900px;" href="{{ URL::previous() }}">Go Back</a>
        <div class="panel panel-default ">
            <div class="panel-heading"><strong>Update Admin</strong></div>
            <div class="panel-body">
    			{!! Form::model($visit,['method' => 'PATCH','route'=>['visits.update',$visit->id]]) !!}
		        <div class="form-group floating-label-form-group controls {{ $errors->has('date') ? ' has-error has-feedback' : '' }}">
		            {!! Form::label('date', 'Date:',['class'=>'col-md-4 control-label']) !!}
		            <div class="col-md-14">
			            {!! Form::text('date',null,['class'=>'form-control','placeholder'=>'Date','data-validation-required-message']) !!}
			            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
			            @if ($errors->has('date'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('date') }}</strong>
			                </span>
			            @endif
		            </div>
		        </div>
		        <div class="form-group floating-label-form-group controls {{ $errors->has('check') ? ' has-error has-feedback' : '' }}">
		            {!! Form::label('check', 'Presence:',['class'=>'col-md-4 control-label']) !!}
		            <div class="col-md-14">
			            {!! Form::text('check','Absent',['class'=>'form-control','placeholder'=>'Presence','data-validation-required-message']) !!}
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
		            		{!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
                        </div>
		        </div>
		        {!! Form::close() !!}
            </div>
        </div>
    </div>
    </div>
@endsection