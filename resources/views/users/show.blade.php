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
        <h1 style="color:black; margin: 0px 0px 0px 100px;">Admin</h1>
        <table class="table table-striped table-bordered table-hover">
            <tbody>
                <tr class="bg-info"/>
                <tr>
                    <td>Last Name</td>
                    <td><?php echo ($admin['lastName']); ?></td>
                </tr>
                <tr>
                    <td>First Name</td>
                    <td><?php echo ($admin['firstName']); ?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><?php echo ($admin['address']); ?></td>
                </tr>
                <tr>
                    <td>City </td>
                    <td><?php echo ($admin['city']); ?></td>
                </tr>
                <tr>
                    <td>State</td>
                    <td><?php echo ($admin['state']); ?></td>
                </tr>
                <tr>
                    <td>Zip </td>
                    <td><?php echo ($admin['zip']); ?></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><?php echo ($admin['phone']); ?></td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td><?php echo ($admin['type']); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
@endsection