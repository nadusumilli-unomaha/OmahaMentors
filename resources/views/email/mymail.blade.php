<!DOCTYPE html>
<html>
<head>
	<title>Notify User</title>
	<style type="text/css">
		#white-background{
			display: none;
			width: 100%;
			height: 100%;
			position: fixed;
			top: 0px;
			left: 0px;
			background: #FFF;
			opacity: 0.7;
			z-index: 9999;
		}

		#dlgbox{
			position: fixed;
			width: 480px;
			z-index: 9999;
			border-radius: 10px;
			background-color: #FFF;
		}

		#dlg-header{
			background-color: #6d84b4;
			color: white;
			font-size: 20px;
			padding: 10px;
			border-top-left-radius: 9px;
			border-top-right-radius: 9px;
			margin: 0px 0px 0px 0px;
			box-shadow: 10px 10px 10px #888888;
			text-align: center;
		}

		#dlg-body{
			background-color: white;
			color: black;
			border: 1px solid;
			border-color: #6d84b4;
			border-bottom-left-radius: 9px;
			border-bottom-right-radius: 9px;
			font-size: 16px;
			padding: 30px;
			margin: 0px 0px 0px 0px;
			box-shadow: 10px 10px 10px #888888;
		}

	</style>
</head>
<body>

	<div id="white-background"></div>
	<div id="dlgbox">
		<div id="dlg-header">Reminder for Class!</div>
		<div id="dlg-body">
			<strong>Hello!</strong>
			<p>You are receiving this email because an event reminder has been triggered.</p><hr/>
			<p style="text-align: center;">{{$messages}}</p><hr/>
			<p>Regards,</p>
			<p>OmahaMentors</p>
		</div>
	</div>
</body>
</html>