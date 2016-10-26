@extends('layouts.app2')

@section('content')
    <style type="text/css">
        td{
            color:black;
        }
    </style>
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-4">
    	<a class="btn btn-primary pull-right" style="margin: 10px 10px 10px 10px;" href="{{ action('UserController@index') }}">Go Back</a></br>
        <h1 style="color:black; margin: 0px 0px 0px 100px;">Visit</h1>
        <table class="table table-striped table-bordered table-hover">
            <tbody>
                <tr class="bg-info"/>
                <tr>
                    <td>Last Name</td>
                    <td><?php echo ($visit['Date']); ?></td>
                </tr>
                <tr>
                    <td>First Name</td>
                    <td><?php echo ($visit['check']); ?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><?php echo ($visit->user['firstName']); ?></td>
                </tr>
                <tr>
                    <td>City </td>
                    <td><?php echo ($visit->student['firstName']); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
@endsection