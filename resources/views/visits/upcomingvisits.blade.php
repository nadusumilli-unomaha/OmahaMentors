@extends('layouts.app2')

@section('content')
	<!-- The Basic Scafolding of the automatic adjusting screen. -->
	<div class="row">
        <div class="col-xs-12 col-sm-6 col-md-8 col-md-offset-2">
        	<a class="btn btn-primary pull-right" href="{{action('HomeController@afterLogin')}}">Go Back</a>
			<h1>Upcoming Visits</h1>
			<div class="table-responsive" style="color:black;">
				<table class="table table-bordered table-striped table-hover table-inverse">
		            <thead>
		                <tr class="bg-info">
		                    <th>Visit Date</th>
		                    <th>Student</th>
		                </tr>
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
		                    </tr>
		                @endforeach
		            </tbody>
		        </table>
			</div>
		</div>
	</div>
@endsection
