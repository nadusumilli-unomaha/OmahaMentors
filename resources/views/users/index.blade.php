@extends('layouts.app2')

@section('content')
    <!-- This is the styling for the table because the text is white by default. -->
    <style type="text/css">
        th, td{
            color:black;
        }

        #adminToggle2 {
            display: none;
        }
        
        #adminToggle3 {
            display: none;
        }
        
        #adminToggle4 {
            display: none;
        }
        
        #adminToggle5 {
            display: none;
        }

        #adminToggle6 {
            display: none;
        }

        #adminToggle7 {
            display: none;
        }

    </style>


    <!--###########################################################################-->
    <!--####   The Basic Scafolding for a dashboard for buttons and access.    ####-->
    <!--###########################################################################-->
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-8 col-md-offset-2">
            <!-- This is the admin dashboard stuff with the colum sizing. -->
            <h1>Welcome Admin</h1>
                <div id="myRadioGroup">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary active">
                            <input type="radio" name="adminToggle" id="option1" autocomplete="off" value="1" checked> View My Profile
                        </label>
                        <label class="btn btn-primary active">
                            <input type="radio" name="adminToggle" id="option2" autocomplete="off" value="2" > View Permission Access List
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="adminToggle" id="option3" autocomplete="off" value="3"> View All Students Profile
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="adminToggle" id="option4" autocomplete="off" value="4"> View All Mentors Profile
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="adminToggle" id="option5" autocomplete="off" value="5"> View All Employee's Profile
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="adminToggle" id="option6" autocomplete="off" value="6"> View All Visits
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="adminToggle" id="option7" autocomplete="off" value="7"> View All Grades
                        </label>
                    </div>
                </div>
        </div>
    </div>
    <!--#############################################################################-->
    <!--####                        The End of the Table.                        ####-->
    <!--#############################################################################-->



    <!--#############################################################################-->
    <!--####     The Basic Scafolding for a table to change user Permissions.    ####-->
    <!--#############################################################################-->
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-8 col-md-offset-2">
            <!-- This is the first admin toggle or the profile information relating to the mentors. -->
            <div id="adminToggle1" class="adminProfile" >
                <h1>My Profile</h1>
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
                                <td><?php echo ($admin->roles[0]['name']); ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- The Update user function. -->
                    <a class="btn btn-primary" href="{{ route('users.edit',$admin->id) }}">Update Information</a>
            </div>

            <div id="adminToggle2" class="adminProfile" >
            <h1>My Profile</h1>
            <div class="table-responsive">
                <!-- The code to list all the mentors and other people stuff that can admin can see and create.-->
                <table class="table table-bordered table-striped table-hover table-inverse">
                    <thead>
                    <tr class="bg-info">
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Current Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zip</th>
                        <th>Primary Email</th>
                        <th>Phone</th>
                        <th>Role Request</th>
                        <th>Admin</th>
                        <th>Employee</th>
                        <th>Mentor</th>
                        <th>Pending</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                                <form action="{{ route('users.assign') }}" method="post">
                                    <td>{{ $user->lastName }}</td>
                                    <td>{{ $user->firstName }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->city }}</td>
                                    <td>{{ $user->state }}</td>
                                    <td>{{ $user->zip }}</td>
                                    <td>{{ $user->email }} <input type="hidden" name="email" value="{{$user->email}}"></td> 
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->role_request }}</td>
                                    <td><input type="checkbox" {{ $user->hasRole('Admin')  ? 'checked' : ''}} name="role_admin"></td>
                                    <td><input type="checkbox" {{ $user->hasRole('Employee')  ? 'checked' : ''}} name="role_employee"></td>
                                    <td><input type="checkbox" {{ $user->hasRole('Mentor')  ? 'checked' : ''}} name="role_mentor"></td>
                                    <td><input type="checkbox" {{ $user->hasRole('Pending')  ? 'checked' : ''}} name="role_pending"></td>
                                    {{csrf_field()}}
                                    <td><button class="btn btn-primary" type="submit">Assign Roles</button></td>
                                </form>
                        </tr>
                    @endforeach
                    <hr/>
                    </tbody>
                </table>
                </div>
                </div>

            <!-- This is the second part of the radio button information. -->
            <div id="adminToggle3" class="adminProfile" >
            <h1>All students Profile</h1>
            <div class="table-responsive">
                <!-- The code to list all the students and other people stuff that can admin can see and create.-->
                <table class="table table-bordered table-striped table-hover table-inverse">
                    <thead>
                    <tr class="bg-info">
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Current Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zip</th>
                        <th>Primary Email</th>
                        <th>Phone</th>
                        <th colspan="3">Actions</th>
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
                                    <td>{{ $student->email }}
                                    <td>{{ $student->phone }}</td>
                                    <td><a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Update</a></td>
                                    <td><a class="btn btn-primary" href="{{ route('students.destroy',$student->id) }}">Delete</a></td>
                                    <td><a class="btn btn-primary" href="{{ route('students.show',$student->id) }}">Read</a></td>
                        </tr>
                    @endforeach
                    <hr/>
                    </tbody>
                </table>
                </div>
                </div>

            <!-- This is the third part of the radio button scafolding. -->
            <div id="adminToggle4" class="adminProfile" >
            <h1>All Mentors Profile</h1>
            <div class="table-responsive">
                <!-- The code to list all the mentors and other people stuff that can admin can see and create.-->
                <table class="table table-bordered table-striped table-hover table-inverse">
                    <thead>
                    <tr class="bg-info">
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Current Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zip</th>
                        <th>Primary Email</th>
                        <th>Phone</th>
                        <th colspan="3" class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($mentors as $mentor)
                        <tr>
                                    <td>{{ $mentor->lastName }}</td>
                                    <td>{{ $mentor->firstName }}</td>
                                    <td>{{ $mentor->address }}</td>
                                    <td>{{ $mentor->city }}</td>
                                    <td>{{ $mentor->state }}</td>
                                    <td>{{ $mentor->zip }}</td>
                                    <td>{{ $mentor->email }}
                                    <td>{{ $mentor->phone }}</td>
                                    <td><a class="btn btn-primary" href="{{ route('users.edit',$mentor->id) }}">Update</a></td>
                                    <td><a class="btn btn-primary" href="{{ route('users.destroy',$mentor->id) }}">Delete</a></td>
                                    <td><a class="btn btn-primary" href="{{ route('users.show',$mentor->id) }}">Read</a></td>
                        </tr>
                    @endforeach
                    <hr/>
                    </tbody>
                </table>
                </div>
                </div>

                <!-- This is the fourth part of the radio button scafolding. -->
            <div id="adminToggle5" class="adminProfile" >
            <h1>All Employee profile</h1>
            <div class="table-responsive">
                <!-- The code to list all the employees and other people stuff that can admin can see and create.-->
                <table class="table table-bordered table-striped table-hover table-inverse">
                    <thead>
                    <tr class="bg-info">
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Current Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zip</th>
                        <th>Primary Email</th>
                        <th>Phone</th>
                        <th colspan="3" class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                                    <td>{{ $employee->lastName }}</td>
                                    <td>{{ $employee->firstName }}</td>
                                    <td>{{ $employee->address }}</td>
                                    <td>{{ $employee->city }}</td>
                                    <td>{{ $employee->state }}</td>
                                    <td>{{ $employee->zip }}</td>
                                    <td>{{ $employee->email }}
                                    <td>{{ $employee->phone }}</td>
                                    <td><a class="btn btn-primary" href="{{ route('users.edit',$employee->id) }}">Update</a></td>
                                    <td><a class="btn btn-primary" href="{{ route('users.destroy',$employee->id) }}">Delete</a></td>
                                    <td><a class="btn btn-primary" href="{{ route('users.show',$employee->id) }}">Read</a></td>
                        </tr>
                    @endforeach
                    <hr/>
                    </tbody>
                </table>
                </div>
                </div>

            <!-- This is the fourth part of the radio button scafolding. -->
            <div id="adminToggle6" class="adminProfile" >
            <h1>All Visits</h1>
            <div class="table-responsive">
                <!-- The code to list all the visits and other people stuff that can admin can see and create.-->
                <table class="table table-bordered table-striped table-hover table-inverse">
                    <thead>
                    <tr class="bg-info">
                        <th>Date</th>
                        <th>Attendance</th>
                        <th>Mentor</th>
                        <th>Student</th>
                        <th colspan="3" class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($visits as $visit)
                        <tr>
                            <td>{{ $visit->Date }}</td>
                            <td>{{ $visit->check }}</td>
                            <td>{{ $visit->users }}</td>
                            <td>{{ $visit->students }}</td>
                            <td><a class="btn btn-primary" href="{{ route('visits.edit',$visit->id) }}">Update</a></td>
                            <td><a class="btn btn-primary" href="{{ route('visits.destroy',$visit->id) }}">Delete</a></td>
                            <td><a class="btn btn-primary" href="{{ route('visits.show',$visit->id) }}">Read</a></td>
                        </tr>
                    @endforeach
                    <hr/>
                    </tbody>
                </table>
                </div>
                </div>

            <!-- This is the fifth part of the radio bnutton Scafolding. -->
            <div id="adminToggle7" class="adminProfile" >
            <h1>All Grade</h1>
            <div class="table-responsive">
                <!-- The code to list all the grades and other people stuff that can admin can see and create.-->
                <table class="table table-bordered table-striped table-hover table-inverse">
                    <thead>
                    <tr class="bg-info">
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Current Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zip</th>
                        <th>Primary Email</th>
                        <th>Phone</th>
                        <th colspan="3" class="text-center">Actions</th>
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
                            <td>{{ $grade->email }}
                            <td>{{ $grade->phone }}</td>
                            <td><a class="btn btn-primary" href="{{ route('grades.edit',$grade->id) }}">Update</a></td>
                            <td><a class="btn btn-primary" href="{{ route('grades.destroy',$grade->id) }}">Delete</a></td>
                            <td><a class="btn btn-primary" href="{{ route('grades.show',$grade->id) }}">Read</a></td>
                        </tr>
                    @endforeach
                    <hr/>
                    </tbody>
                </table>
                </div>
                </div>
        </div>
    </div>
    <!--#############################################################################-->
    <!--####                        The End of the Table.                        ####-->
    <!--#############################################################################-->


    
@endsection