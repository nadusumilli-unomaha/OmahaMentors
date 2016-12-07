@extends('layouts.app2')

@section('content')
	<style type="text/css">
		/* The switch - the box around the slider */
		.switchround {
		  position: relative;
		  display: inline-block;
		  width: 60px;
		  height: 34px;
		}

		/* Hide default HTML checkbox */
		.switchround input {display:none;}

		/* The slider */
		.slider {
		  position: absolute;
		  cursor: pointer;
		  top: 0;
		  left: 0;
		  right: 0;
		  bottom: 0;
		  background-color: #ccc;
		  -webkit-transition: .4s;
		  transition: .4s;
		}

		.slider:before {
		  position: absolute;
		  content: "";
		  height: 26px;
		  width: 26px;
		  left: 4px;
		  bottom: 4px;
		  background-color: white;
		  -webkit-transition: .4s;
		  transition: .4s;
		}

		input:checked + .slider {
		  background-color: #2196F3;
		}

		input:focus + .slider {
		  box-shadow: 0 0 1px #2196F3;
		}

		input:checked + .slider:before {
		  -webkit-transform: translateX(26px);
		  -ms-transform: translateX(26px);
		  transform: translateX(26px);
		}

		/* Rounded sliders */
		.slider.round {
		  border-radius: 34px;
		}

		.slider.round:before {
		  border-radius: 50%;
		}

        td, th{
        	color:black;
        }
        
		.nav-tabs>li>a:hover {
		    background-color: #23527c;
		    color: #23527c;
		} 
		.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus{
			background-color:#2c3e50;
			color:#161f29;
		}
	</style>
	<!-- The Basic Scafolding of the automatic adjusting screen. -->
	<div class="row">
        <div class="col-xs-12 col-sm-6 col-md-8 col-md-offset-2">
			<!--###########################################################################-->
			<!--####    The Basic Scafolding for Finding a Mentor and adding code.   ####-->
			<!--###########################################################################-->
				@if($user->roles[0]->name === 'Mentor')
					<h1 style="color: #2c3e50;">Welcome {{$user->firstName}}</h1>
					<ul class="nav nav-tabs nav-justified" id="myTab">
		                <li class="active"><a style="color: white;" href="#mentorToggle1" data-toggle="tab"><strong>My Profile</strong></a></li>
		                <li><a style="color: white;" href="#mentorToggle2" data-toggle="tab"><strong>Manage My Students</strong></a></li>
		                <li><a style="color: white;" href="#mentorToggle3" data-toggle="tab"><strong>Attendance</strong></a></li>
		                <li><a style="color: white;" href="#mentorToggle4" data-toggle="tab"><strong>Note Section</strong></a></li>
		            </ul>

					<!-- This is the first mentor toggle or the profile information relating to the mentors. -->
					<div class="tab-content">
						<div id="mentorToggle1" class="tab-pane fade in active" >
							<h1>Mentor Profile</h1>
							<table class="table table-striped table-bordered table-hover">
					            <tbody>
					                <tr class="bg-info"/>
					                <tr>
					                    <td>Last Name</td>
					                    <td><?php echo ($user['lastName']); ?></td>
					                </tr>
					                <tr>
					                    <td>First Name</td>
					                    <td><?php echo ($user['firstName']); ?></td>
					                </tr>
					                <tr>
					                    <td>Address</td>
					                    <td><?php echo ($user['address']); ?></td>
					                </tr>
					                <tr>
					                    <td>City </td>
					                    <td><?php echo ($user['city']); ?></td>
					                </tr>
					                <tr>
					                    <td>State</td>
					                    <td><?php echo ($user['state']); ?></td>
					                </tr>
					                <tr>
					                    <td>Zip </td>
					                    <td><?php echo ($user['zip']); ?></td>
					                </tr>
					                <tr>
					                    <td>Phone</td>
					                    <td><?php echo ($user['phone']); ?></td>
					                </tr>
					                <tr>
					                    <td>Type</td>
					                    <td><?php echo ($user->roles[0]['name']); ?></td>
					                </tr>
					            </tbody>
					        </table>
					        <!-- The Update user function. -->
					        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}"><span style="margin: 3px 10px 0px 0px;" class="glyphicon glyphicon-pencil"></span>Edit My Profile</a>
							<!-- This is the Visit Schedule link. -->
							<a class="btn btn-primary" href="{{action('HomeController@upcoming')}}">Upcoming Visits</a>
						</div>

						<!-- This is the second mentor toggle or the student information relating to the mentors. -->
						<div id="mentorToggle4" class="tab-pane fade">
							<h1>Manage Note/Comments</h1>
							<div class="table-responsive" style="color:black;">
								<table class="table table-bordered table-striped table-hover table-inverse">
					                <thead>
						                <tr class="bg-info">
						                    <th>Visit Date</th>
						                    <th>Mentor</th>
						                    <th>Student</th>
						                    <th>Note</th>
						                    <th colspan="3"></th>
						                </tr>
					                </thead>
					                <tbody>
						                @foreach ($notes as $note)
						                    <tr>
				                                <td>{{$note->visit->Date}}</td>	
				                                <td>{{$note->user->firstName}}</td>
				                                <td>{{$note->student->firstName}}</td>
				                                <td>{{ $note->description }}</td>
												<td><a class="btn btn-primary" href="{{ route('notes.show',$note->id) }}"><span style="margin: 3px 10px 0px 0px;" class="glyphicon glyphicon-eye-open"></span>Show</a></td>
												<td><a class="btn btn-primary" href="{{ route('notes.edit',$note->id) }}"><span style="margin: 3px 10px 0px 0px;" class="glyphicon glyphicon-pencil"></span>Edit</a></td>
												<td>
													{!! Form::open(['method' => 'DELETE', 'route'=>['notes.destroy', $note->id], 'id'=>'noteDelete'])!!}
                                                    {!! Form::button('<span style="margin: 3px 5px 0px 0px;" class="glyphicon glyphicon-trash"></span>Delete', ['class' => 'btn btn-danger','name'=>'remove_levels']) !!}
                                                    {!! Form::close() !!}
												</td>
						                    </tr>
						                @endforeach
					                </tbody>
					            </table>
							</div>
						</div>
							
						<div id="mentorToggle3" class="tab-pane fade">
							<h1>Visit Attendance</h1>
							<div class="panel panel-default">
								<div class="panel-heading">
									Student Attendance
								</div>
								<div class="table-responsive" style="color:black;">
									<table class="table table-bordered table-striped table-hover table-inverse">
										<thead>
											<th>Student</th>
											<th>Date</th>
											<th>Present</th>
											<th>Notes</th>
											<th></th>
										</thead>
										<tbody>
											@foreach ($visits as $visit)
												<tr>
													<td>
														{{ $visit->student->firstName }}
													</td>
													<td>
														{{ $visit->Date }}
													</td>
													<td>
														{!! Form::open(['method' => 'PATCH','id'=>'isPresent','route'=>['visits.update',$visit->id]]) !!}
															<label class="switchround" >
																<input type="checkbox" onchange="this.form.submit()" {{ $visit->check === 'Present'  ? 'checked' : ''}} name="check" value={{ $visit->check === 'Present'  ? '' : 'Present'}}>
															  	<div class="slider round"></div>
															</label>
		        										{!! Form::close() !!}
													</td>
													<td>
														{!! Form::open(['url' => 'notes', 'class'=>'form-horizontal', 'role'=>'form']) !!}
															<input type="hidden" name="user_id" value="{{$visit->user->id}}">
															<input type="hidden" name="student_id" value="{{$visit->student->id}}">
															<input type="hidden" name="visit_id" value="{{$visit->id}}">
															<textarea name="description" cols="30"></textarea>
													</td>
													<td>
															<input class="btn btn-primary" type="submit" name="submit">
		        										{!! Form::close() !!}
													</td>
												</tr>
					                		@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div id="mentorToggle2" class="tab-pane fade">
							<h1>Student Profiles</h1>
							<div class="table-responsive" style="color:black;">
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
						                    <th>Date of Birth</th>
						                    <th>Gender</th>
						                    <th>School</th>
						                    <th>Actions</th>
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
				                                <td>{{ $student->dob }}</td>
				                                <td>{{ $student->gender }}</td>
				                                <td>{{ $student->school }}</td>
												<td><a class="btn btn-primary" href="{{ route('students.show',$student->id) }}"><span style="margin: 3px 10px 0px 0px;" class="glyphicon glyphicon-eye-open"></span>Show</a></td>
						                    </tr>
						                @endforeach
					                </tbody>
					            </table>
							</div>
						</div>
					</div>
				@endif
				<!--###########################################################################-->
				<!--####                     The End of Mentor Code.                       ####-->
				<!--###########################################################################-->
				
				<!--###########################################################################-->
				<!--####    The Basic Scafolding for Finding a Employee and adding code.   ####-->
				<!--###########################################################################-->
			@if($user->roles[0]->name === 'Employee')
				<h1 style="color: #2c3e50;">Welcome {{$user->firstName}}</h1>
				<ul class="nav nav-tabs nav-justified" id="myTab">
	                <li class="active"><a style="color: white;" href="#employeeToggle1" data-toggle="tab"><strong>My Profile</strong></a></li>
	                <li><a style="color: white;" href="#employeeToggle2" data-toggle="tab"><strong>Manage Students</strong></a></li>
	                <li><a style="color: white;" href="#employeeToggle3" data-toggle="tab"><strong>Manage Mentors</strong></a></li>
	                <li><a style="color: white;" href="#employeeToggle4" data-toggle="tab"><strong>Manage Visits</strong></a></li>
	                <li><a style="color: white;" href="#employeeToggle5" data-toggle="tab"><strong>Manage Grade</strong></a></li>
	                <li><a style="color: white;" href="#employeeToggle6" data-toggle="tab"><strong>Notify Visit</strong></a></li>
	                <li><a style="color: white;" href="#employeeToggle7" data-toggle="tab"><strong>Manage Notes</strong></a></li>
	                <li><a style="color: white;" href="#employeeToggle8" data-toggle="tab"><strong>Genenrate Report</strong></a></li>
	            </ul>
				<div class="tab-content">
					<div id="employeeToggle1" class="tab-pane fade in active" >
						<h1>My Profile</h1>
						<table class="table table-striped table-bordered table-hover">
				            <tbody>
				                <tr class="bg-info"/>
				                <tr>
				                    <td>Last Name</td>
				                    <td><?php echo ($user['lastName']); ?></td>
				                </tr>
				                <tr>
				                    <td>First Name</td>
				                    <td><?php echo ($user['firstName']); ?></td>
				                </tr>
				                <tr>
				                    <td>Address</td>
				                    <td><?php echo ($user['address']); ?></td>
				                </tr>
				                <tr>
				                    <td>City </td>
				                    <td><?php echo ($user['city']); ?></td>
				                </tr>
				                <tr>
				                    <td>State</td>
				                    <td><?php echo ($user['state']); ?></td>
				                </tr>
				                <tr>
				                    <td>Zip </td>
				                    <td><?php echo ($user['zip']); ?></td>
				                </tr>
				                <tr>
				                    <td>Phone</td>
				                    <td><?php echo ($user['phone']); ?></td>
				                </tr>
				                <tr>
				                    <td>Type</td>
				                    <td><?php echo ($user->roles[0]['name']); ?></td>
				                </tr>
				            </tbody>
				        </table>
				        <!-- The Update user function. -->
				        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}"><span style="margin: 3px 10px 0px 0px;" class="glyphicon glyphicon-pencil"></span>Edit My Profile</a>
					</div>

					<div id="employeeToggle2" class="tab-pane fade">
	                    {!! Form::open(['route'=> 'afterLogin', 'method' => 'GET', 'class' => 'navbar-form navbar-right', 'role' => 'search']) !!}
	                        <div class="input-group">
	                            {!! Form::text('studentTerm', Request::get('studentTerm'), ['class'=>'form-control', 'placeholder' => 'Search...']) !!}
	                            <span class="input-group-btn">
	                                <button class="btn btn-default" type="submit">
	                                    <i class="glyphicon glyphicon-search"></i>
	                                </button>
	                            </span>
	                        </div>
	                    {!! Form::close() !!}
						<h1  style="margin: 0px 0px 0px 250px;">Student Profile</h1>
						<a class="btn btn-primary" style="margin: 10px 0px 10px 250px;" href="{{ action('StudentController@create') }}"><span style="margin: 3px 10px 0px 0px;" class="glyphicon glyphicon-briefcase"></span>Create a Student</a><br/>
						<div class="table-responsive">
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
				                    <th>Date of Birth</th>
				                    <th>Gender</th>
				                    <th>School</th>
				                    <th>Actions</th>
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
		                                <td>{{ $student->dob }}</td>
		                                <td>{{ $student->gender }}</td>
		                                <td>{{ $student->school }}</td>
										<td><a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}"><span style="margin: 3px 10px 0px 0px;" class="glyphicon glyphicon-pencil"></span>Update</a></td>
				                    </tr>
				                @endforeach
				                </tbody>
				            </table>
			            </div>
					</div>

					<div id="employeeToggle3" class="tab-pane fade">
	                    {!! Form::open(['route'=> 'afterLogin', 'method' => 'GET', 'class' => 'navbar-form navbar-right', 'role' => 'search']) !!}
	                        <div class="input-group">
	                            {!! Form::text('mentorTerm', Request::get('mentorTerm'), ['class'=>'form-control', 'placeholder' => 'Search...']) !!}
	                            <span class="input-group-btn">
	                                <button class="btn btn-default" type="submit">
	                                    <i class="glyphicon glyphicon-search"></i>
	                                </button>
	                            </span>
	                        </div>
	                    {!! Form::close() !!}
						<h1  style="margin: 0px 0px 0px 250px;">Mentor Profile</h1>
						<a class="btn btn-primary" style="margin: 10px 0px 10px 250px;" href="{{ action('UserController@create') }}"><span style="margin: 3px 10px 0px 0px;" class="glyphicon glyphicon-briefcase"></span>Create a Mentor</a><br/>
						<div class="table-responsive">
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
				                    <th>Actions</th>
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
		                                <td>{{ $mentor->email }}</td> 
		                                <td>{{ $mentor->phone }}</td>
										<td><a class="btn btn-primary" href="{{ route('users.edit',$mentor->id) }}"><span style="margin: 3px 10px 0px 0px;" class="glyphicon glyphicon-pencil"></span>Update</a></td>
				                    </tr>
				                @endforeach
				                </tbody>
				            </table>
			            </div>
					</div>

					<div id="employeeToggle4" class="tab-pane fade">
	                    {!! Form::open(['route'=> 'afterLogin', 'method' => 'GET', 'class' => 'navbar-form navbar-right', 'role' => 'search']) !!}
	                        <div class="input-group">
	                            {!! Form::text('visitTerm', Request::get('visitTerm'), ['class'=>'form-control', 'placeholder' => 'Search...']) !!}
	                            <span class="input-group-btn">
	                                <button class="btn btn-default" type="submit">
	                                    <i class="glyphicon glyphicon-search"></i>
	                                </button>
	                            </span>
	                        </div>
	                    {!! Form::close() !!}
						<h1  style="margin: 0px 0px 0px 250px;">visit Profile</h1>
						<a class="btn btn-primary" style="margin: 10px 0px 10px 250px;" href="{{ action('VisitController@create') }}"><span style="margin: 3px 10px 0px 0px;" class="glyphicon glyphicon-briefcase"></span>Create a visit</a><br/>
						<div class="table-responsive">
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
				                @foreach ($visits as $visit)
				                    <tr>
		                                <td>{{ $visit->Date }}</td>
		                                <td>{{ $visit->check }}</td>
		                                <td>{{ $visit->user->firstName }}</td>
		                                <td>{{ $visit->student->firstName }}</td>
										<!-- <td><a class="btn btn-primary" href=" route('visits.edit',$visit->id) }}">Update</a></td> -->
				                    </tr>
				                @endforeach
				                </tbody>
				            </table>
			            </div>
				    </div>

					<div id="employeeToggle5" class="tab-pane fade">
	                    {!! Form::open(['route'=> 'afterLogin', 'method' => 'GET', 'class' => 'navbar-form navbar-right', 'role' => 'search']) !!}
	                        <div class="input-group">
	                            {!! Form::text('gradeTerm', Request::get('gradeTerm'), ['class'=>'form-control', 'placeholder' => 'Search...']) !!}
	                            <span class="input-group-btn">
	                                <button class="btn btn-default" type="submit">
	                                    <i class="glyphicon glyphicon-search"></i>
	                                </button>
	                            </span>
	                        </div>
	                    {!! Form::close() !!}
						<h1  style="margin: 0px 0px 0px 250px;">grade Profile</h1>
						<a class="btn btn-primary" style="margin: 10px 0px 10px 250px;" href="{{ action('GradeController@create') }}"><span style="margin: 3px 10px 0px 0px;" class="glyphicon glyphicon-briefcase"></span>Create a grade</a><br/>
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover table-inverse">
				                <thead>
				                <tr class="bg-info">
				                    <th>Subject</th>
				                    <th>Period</th>
				                    <th>Grade</th>
				                    <th>Comments</th>
				                    <th>Student</th>
				                    <th>Actions</th>
				                </tr>
				                </thead>
				                <tbody>
				                @foreach ($grades as $grade)
				                    <tr>
		                                <td>{{ $grade->subject }}</td>
		                                <td>{{ $grade->period }}</td>
		                                <td>{{ $grade->actual }}</td>
		                                <td>{{ $grade->comments }}</td>
		                                <td>{{ $grade->student->firstName }}</td>
										<td><a class="btn btn-primary" href="{{ route('grades.edit',$grade->id) }}"><span style="margin: 3px 10px 0px 0px;" class="glyphicon glyphicon-pencil"></span>Update</a></td>
				                    </tr>
				                @endforeach
				                </tbody>
				            </table>
			            </div>
				    </div>
						
					{{-- This is the form control for sending notification. --}}
					<div id="employeeToggle6" class="tab-pane fade">
						<div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-4">
							<div style="margin: 10px" class="panel panel-default">
								<div class="panel-heading">
									<h1>Notify Users</h1>
								</div>
								<div class="panel-body">
									<form style="color:black;" class="form-horizontal" action="{{route('sendmail')}}" method="post">
										{!! Form::label('email', 'Email:',['class'=>'col-md-4 control-label']) !!}
										<input type="email" class="form-control" name="email" placeholder="Email Address">
										@if ($errors->has('email'))
				                            <span class="help-block">
				                                <strong>{{ $errors->first('email') }}</strong>
				                            </span>
				                        @endif
										{!! Form::label('messages', 'Message:',['class'=>'col-md-4 control-label']) !!}
										<textarea rows="7" class="form-control" name="messages" placeholder="Message To Send"></textarea>
										@if ($errors->has('messages'))
				                            <span class="help-block">
				                                <strong>{{ $errors->first('messages') }}</strong>
				                            </span>
				                        @endif
										<button class="btn btn-primary" style="margin: 10px 0px 10px 0px;" type="submit">Notify</button>
										{{ csrf_field() }}
									</form>
								</div>
							</div>
						</div>
					</div>
					{{-- This is the ending of the form for notification. --}}

					<!-- This is the second mentor toggle or the student information relating to the mentors. -->
					<div id="employeeToggle7" class="tab-pane fade">
						<h1>Manage Note/Comments</h1>
						<div class="table-responsive" style="color:black;">
							<table class="table table-bordered table-striped table-hover table-inverse">
				                <thead>
					                <tr class="bg-info">
					                    <th>Visit Date</th>
					                    <th>Mentor</th>
					                    <th>Student</th>
					                    <th>Note</th>
					                    <th></th>
					                </tr>
				                </thead>
				                <tbody>
					                @foreach ($notes as $note)
					                    <tr>
			                                <td>{{$note->visit->Date}}</td>	
			                                <td>{{$note->user->firstName}}</td>
			                                <td>{{$note->student->firstName}}</td>
			                                <td>{{ $note->description }}</td>
											<td><a class="btn btn-primary" href="{{ route('notes.show',$note->id) }}"><span style="margin: 3px 10px 0px 0px;" class="glyphicon glyphicon-eye-open"></span>Show</a></td>
					                    </tr>
					                @endforeach
				                </tbody>
				            </table>
						</div>
					</div>
					
					{{-- This is the second mentor toggle or the student information relating to the mentors. --}}
					<div id="employeeToggle8" class="tab-pane fade" >
	                    <div class="btn-group pull-right">
	                        <button type="button" class="btn btn-primary"><span style="margin: 0px 5px 0px 0px;" class="glyphicon glyphicon-save"></span>Export</button>
	                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
	                            <span class="caret"></span>
	                            <span class="sr-only">Toggle Dropdown</span>
	                        </button>
	                        <ul class="dropdown-menu" role="menu" id="export-menu">
	                            <li id="export-to-excel"><a href="{{ URL::to('getExport') }}">Export to Excel</a></li>
	                            <li class="divider"></li>
	                            <li><a href="#">Other</a></li>
	                        </ul>
	                    </div>
			            <h1  style="margin: 10px 0px 10px 90px;">Generate Reports</h1>
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
				                            <td><a class="btn btn-primary" href="{{ route('PDF.show',$student->id) }}"><span style="margin: 3px 10px 0px 0px;" class="glyphicon glyphicon-eye-open"></span>Read Report</a></td>
				                            <?php $bool = 1;?>
				                    </tr>
				                @endforeach
				                </tbody>
				            </table>
		        		</div>
		        	</div>

		        </div>
			@endif
        </div>
    </div>
				<!--###########################################################################-->
				<!--####                     The End of Mentor Code.                       ####-->
				<!--###########################################################################-->
		</div>
	</div>
	<!--  -->

@endsection