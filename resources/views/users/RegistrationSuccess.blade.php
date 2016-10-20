@extends('layouts.app2')

@section('content')
	<!-- The Basic Scafolding of the automatic adjusting screen. -->
	<div class="row">
	        <div class="col-xs-12 col-sm-6 col-md-8 col-md-offset-2">
				
				<!--###########################################################################-->
				<!--####    The Basic Scafolding for Finding a Employee and adding code.   ####-->
				<!--###########################################################################-->
				@if($passwordSuccess === 'passed')
					<div class="panel panel-default">
						<div class="panel-heading">
							<strong><h2>Password Change Success</h2></strong>
						</div>
						<div class="panel-body" style="color:black;">
							<p>The password for the account has been successfully changed.<p/>
						</div>
					</div>
				@elseif($passwordSuccess === 'failed')
					<div class="panel panel-default">
						<div class="panel-heading">
							<strong><h2>Password Change Failure</h2></strong>
						</div>
						<div class="panel-body" style="color:black;">
							<p>The password change request for the account has failed.<p/>
						</div>
					</div>
				@else
					<div class="panel panel-default">
						<div class="panel-heading">
							<strong><h2>Registration Success</h2></strong>
						</div>
						<div class="panel-body" style="color:black;">
							<p>Your account has been registered and forwarded to the admin.<p/>
							<p>After the Information is reviewed and a decision has been made we will inform you.</p><br/><br/>
							<p class="text-right">Thank You for your Patience!</p>
						</div>
					</div>
				@endif
				<!--###########################################################################-->
				<!--####                     The End of Mentor Code.                       ####-->
				<!--###########################################################################-->

		</div>
	</div>
	<!--  -->
@endsection