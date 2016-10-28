<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2}

        th {
            background-color: #18bc9c;
            color: white;
        }
    </style>
    <title>my Report</title>
</head>
<body>
    <h1>Student Reports</h1><br/>
        <div>
            <h3>Student information</h3>
            <table>
                <thead>
                <tr >
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Current Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip</th>
                    <th>Primary Email</th>
                    <th>phone</th>
                    <th>Type</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                            <td>{{ $student->lastName }}</td>
                            <td>{{ $student->firstName }}</td>
                            <td>{{ $student->address }}</td>
                            <td>{{ $student->city }}</td>
                            <td>{{ $student->state }}</td>
                            <td>{{ $student->zip }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->phone }}</td>
                            <td>{{ $student->type }}</td>
                    </tr>
                </tbody>
            </table>
        </div><br/><br/>

        <div>
            <!-- The code to list all the grades and other people stuff that can admin can see and create.-->
            <h3>Student's Grade Information</h3>
            <table>
                <thead>
                <tr >
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
                </tbody>
            </table>
            </div>
        </div><br/><br/>

        <div>
                <!-- The code to list all the visits and other people stuff that can admin can see and create.-->
            <h3>Student's Visit Information</h3>
               <table>
                    <thead>
                        <tr>
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
                    </tbody>
                </table>
                </div>
        </div><br/><br/>
</body>
</html>