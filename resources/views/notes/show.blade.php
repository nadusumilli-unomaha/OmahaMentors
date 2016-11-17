@extends('layouts.app2')

@section('content')
	<style type="text/css">
        td{
            color:black;
        }
    </style>
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-4">
    	<a class="btn btn-primary pull-right" style="margin: 10px 10px 10px 10px;" href="{{ URL::previous() }}">Go Back</a></br>
        <h1 style="color:black; margin: 0px 0px 0px 100px;">Note</h1>
        <table class="table table-striped table-bordered table-hover">
            <tbody>
                <tr class="bg-info"/>
                <tr>
                    <td>Description</td>
                    <td><?php echo ($note['description']); ?></td>
                </tr>
                <tr>
                    <td>User Name</td>
                    <td><?php echo ($note->user['firstName']); ?></td>
                </tr>
                <tr>
                    <td>Student Name</td>
                    <td><?php echo ($note->student['firstName']); ?></td>
                </tr>
                <tr>
                    <td>Visit Date</td>
                    <td><?php echo ($note->visit['Date']); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
@endsection