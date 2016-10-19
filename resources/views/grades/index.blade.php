@extends('layouts.app2')

@section('content')
    <!-- This is the styling for the table because the text is white by default. -->
    <style type="text/css">
        th, td{
            color:black;
        }
    </style>
    <!-- This is the grade dashboard stuff with the colum sizing. -->
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Acess Dashboard</div>
                <div class="panel-body">                   
                    <a style="margin: 10px 10px 10px 10px;" class="btn btn-primary" href="{{action('UserController@create')}}">Admins</a>
                    <a style="margin: 10px 10px 10px 10px;" class="btn btn-primary" href="{{action('VisitController@index')}}">Visit</a>
                    <a style="margin: 10px 10px 10px 10px;" class="btn btn-primary" href="{{action('GradeController@index')}}">Grade</a>
                </div>
            </div>
        </div>
    </div>

    <!-- The code to list all the students and other people stuff that can grade can see and create.-->
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-8 col-md-offset-2">
        <div class="table-responsive">   
            <table class="table table-bordered table-striped table-hover table-inverse">
                <thead>
                <tr class="bg-info">
                    <th>lastName</th>
                    <th>firstName</th>
                    <th>Current Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip</th>
                    <th>Primary Email</th>
                    <th>phone</th>
                    <th>Type</th>
                    <th colspan="3">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($grades as $grade)
                    <tr>
                            <td>{{ $grade->lastName }}</td>
                            <td>{{ $grade->firstName }}</td>
                            <td>{{ $grade->address }}</td>
                            <td>{{ $grade->city }}</td>
                            <td>{{ $grade->state }}</td>
                            <td>{{ $grade->zip }}</td>
                            <td>{{ $grade->email }}</td>
                            <td>{{ $grade->phone }}</td>
                            <td>{{ $grade->type }}</td>
                            <td><a href="{{url('grades',$grade->id)}}" class="btn btn-primary">Read</a></td>
                            <td><a href="{{route('grades.edit',$grade->id)}}" class="btn btn-warning">Update</a></td>
                            <td>
                                {!! Form::open(['method' => 'DELETE', 'route'=>['grades.destroy', $grade->id], 'onSubmit'=> 'if(!confirm("\n\nAre you Sure you want to delete the grade?")){return false;}'])!!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                            <?php $bool = 1;?>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection