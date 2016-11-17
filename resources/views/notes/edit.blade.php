@extends('layouts.app2')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-4">
        <a class="btn btn-primary" style="margin: 0px 0px 0px 900px;" href="{{ action('HomeController@afterLogin') }}">Go Back</a>
        <div class="panel panel-default ">
            <div class="panel-heading"><strong>Update Admin</strong></div>
            <div class="panel-body">
    			{!! Form::model($note,['method' => 'PATCH','route'=>['notes.update',$note->id]]) !!}
			        <div class="form-group floating-label-form-group controls {{ $errors->has('description') ? ' has-error has-feedback' : '' }}">
			            {!! Form::label('description', 'Description:',['class'=>'col-md-4 control-label']) !!}
			            <div class="col-md-14">
				            {!! Form::text('description',$note['description'],['class'=>'form-control','placeholder'=>'Description','data-validation-required-message']) !!}
				            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
				            @if ($errors->has('description'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('description') }}</strong>
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