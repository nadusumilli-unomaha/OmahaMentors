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
        <h1 style="color:black; margin: 0px 0px 0px 100px;">Student</h1>
        <table class="table table-striped table-bordered table-hover">
            <tbody>
                <tr class="bg-info"/>
                <tr>
                    <td>Last Name</td>
                    <td><?php echo ($student['lastName']); ?></td>
                </tr>
                <tr>
                    <td>First Name</td>
                    <td><?php echo ($student['firstName']); ?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><?php echo ($student['address']); ?></td>
                </tr>
                <tr>
                    <td>City </td>
                    <td><?php echo ($student['city']); ?></td>
                </tr>
                <tr>
                    <td>State</td>
                    <td><?php echo ($student['state']); ?></td>
                </tr>
                <tr>
                    <td>Zip </td>
                    <td><?php echo ($student['zip']); ?></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><?php echo ($student['phone']); ?></td>
                </tr>
                <tr>
                    <td>School</td>
                    <td><?php echo ($student['school']); ?></td>
                </tr>
                <tr>
                    <td>Date of Birth</td>
                    <td><?php echo ($student['dob']); ?></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><?php echo ($student['gender']); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>


   <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-8 col-md-offset-2">
        <div class="table-responsive">
                <!-- The code to list all the grades and other people stuff that can admin can see and create.-->
                <table class="table table-bordered table-striped table-hover table-inverse">
                    <thead>
                    <tr class="bg-info">
                        <th>Subject</th>
                        <th>Period</th>
                        <th>Grade</th>
                        <th>Comments</th>
                                            
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($student->grades as $grade)
                            <tr>
                            <td>{{ $grade->subject }}</td>
                            <td>{{ $grade->period }}</td>
                            <td>{{ $grade->actual }}</td>
                            <td>{{ $grade->comments }}</td>
                           </tr>
                    @endforeach
                    <hr/>
                    </tbody>
                </table>
                </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-8 col-md-offset-2">
        <div class="table-responsive">
                <!-- The code to list all the visits and other people stuff that can admin can see and create.-->
               <table class="table table-bordered table-striped table-hover table-inverse">
                    <thead>
                    <tr class="bg-info">
                        <th>Date</th>
                        <th>Attendance</th>
                        <th>Mentor</th>
                        <th>Student</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($student->visits as $visit)
                        <tr>
                            <td>{{ $visit->Date }}</td>
                            <td>{{ $visit->check }}</td>
                            <td>{{ $visit->user->firstName }}</td>
                            <td>{{ $visit->student->firstName }}</td>
                            </tr>
                    @endforeach
                    <hr/>
                    </tbody>
                </table>
                </div>
        </div>
    </div>
@endsection