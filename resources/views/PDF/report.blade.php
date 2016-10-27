
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h2> Test Report </h2>
</body>
</html>




<!--<!DOCTYPE html>
<html>



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
                            <td>{{ $student->type }}</td>
                            
                    </tr>
                @endforeach
                </tbody>
       
</html>  
