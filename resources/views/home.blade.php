@extends('layouts.app2')

@section('content')
    <style type="text/css">
        td, th{
            color:black;
        }
    </style>
	<div class="row-fluid">
	<div class="col-xs-12 col-sm-6 col-md-9 col-md-offset-2"></div>
	    <div class="panel panel-default">
	    	<div class="panel-heading">Panel Heading</div>
	    	<div class="panel-body" style="color:black;">Panel Content</div>
	    	<a class="btn btn-primary" href="{{action('UserController@index')}}">View All Users</a>
	    </div>
    </div>
@endsection
