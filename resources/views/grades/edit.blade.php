@extends('layouts.app2')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-4">
        <a class="btn btn-primary" style="margin: 0px 0px 0px 900px;" href="{{ URL::previous() }}">Go Back</a>
        <div class="panel panel-default ">
            <div class="panel-heading"><strong>Update Admin</strong></div>
            <div class="panel-body">
    			{!! Form::model($grade,['method' => 'PATCH','route'=>['grades.update',$grade->id]]) !!}
		        
		        <div class="form-group floating-label-form-group controls {{ $errors->has('subject') ? ' has-error has-feedback' : '' }}">
		            {!! Form::label('subject', 'Subject:',['class'=>'col-md-4 control-label']) !!}
		            <div class="col-md-14">
			            {!! Form::text('subject',$grade['subject'],['class'=>'form-control','placeholder'=>'Subject','data-validation-required-message']) !!}
			            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
			            @if ($errors->has('subject'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('subject') }}</strong>
			                </span>
			            @endif
		            </div>
		        </div>
		        <div class="form-group floating-label-form-group controls {{ $errors->has('period') ? ' has-error has-feedback' : '' }}">
		            {!! Form::label('period', 'Period:',['class'=>'col-md-4 control-label']) !!}
		            <div class="col-md-14">
			            {!! Form::text('period',$grade['period'],['class'=>'form-control','placeholder'=>'Period','data-validation-required-message']) !!}
			            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
			            @if ($errors->has('period'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('period') }}</strong>
			                </span>
			            @endif
		            </div>
		        </div>
		        <div class="form-group floating-label-form-group controls {{ $errors->has('actual') ? ' has-error has-feedback' : '' }}">
		            {!! Form::label('actual', 'Grade:',['class'=>'col-md-4 control-label']) !!}
		            <div class="col-md-14">
			            {!! Form::text('actual',$grade['actual'],['class'=>'form-control','placeholder'=>'Grade','data-validation-required-message']) !!}
			            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
			            @if ($errors->has('actual'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('actual') }}</strong>
			                </span>
			            @endif
		            </div>
		        </div>
		        <div class="form-group floating-label-form-group controls {{ $errors->has('comments') ? ' has-error has-feedback' : '' }}">
		            {!! Form::label('comments', 'Comments:',['class'=>'col-md-4 control-label']) !!}
		            <div class="col-md-14">
			            {!! Form::text('comments',$grade['comments'],['class'=>'form-control','placeholder'=>'Comments','data-validation-required-message']) !!}
			            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
			            @if ($errors->has('comments'))
			                <span class="help-block">
			                    <strong>{{ $errors->first('comments') }}</strong>
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