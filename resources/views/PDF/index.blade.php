@extends('layouts.app2')

@section('content')
    <!-- This is the styling for the table because the text is white by default. -->
    <style type="text/css">
        th, td{
            color:black;
        }
    </style>
    <!-- This is the student dashboard stuff with the colum sizing. -->
        <!-- The code to list all the students and other people stuff that can student can see and create.-->
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
                  
                    <th colspan="2">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($students as $student)
                    <tr>
                            <td>{{ $student->lastName }}</td>
                            <td>{{ $student->firstName }}</td>
                            <td>{{ $student->address }}</td>
                            <td>{{ $student->city }}</td>
                            <td>{{ $student->state }}</td>
                            <td>{{ $student->zip }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->phone }}</td>
                           
                            <td><a href="{{url('/generatePDF')}}" class="btn btn-primary">Generate Report</a></td>
                            <td><a class="btn btn-primary" href="{{ route('PDF.show',$student->id) }}">Read Report</a></td>
                          
                            <?php $bool = 1;?>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection