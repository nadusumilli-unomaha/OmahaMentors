@extends('layouts.app2')

@section('content')
	<div class="row">
        <div class="col-xs-12 col-sm-6 col-md-8 col-md-offset-2">
			<form action="postImport" method="post" enctype="multipart/form-data">
				<input style="margin: 10px 0px 0px 400px;" type="file" name="student" />
				<input style="color: black;" type="submit" value="Import" />
			</form>
		</div>
	</div>
@endsection