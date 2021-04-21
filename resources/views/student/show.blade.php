@extends('layouts.app1')
@section('content')
          <div class="row content-justify-center">
	<div class="col-sm-6">
		<table class="table table-bordered">
			<tbody>
				<th>#</th>
				<tr><th>Name</th><td>{{$student->id}}</td></tr>
				<tr><th>User number</th><td>{{$student->user_id}}</td></tr>
				<tr><th>Registration number</th><td>{{$student->reg_no}}</td></tr>
				<tr><th>Course number</th><td>{{$student->course_id}}</td></tr>
				<tr><th>Created at</th><td>{{$student->created_at}}</td></tr>
				<tr><th>Name</th><td>{{$student->updated_at}}</td></tr>
				<!-- This Page is a show page that shows the individual record detail from the index.blade.php. Once a user clicks "view" he's directed here. How do we link index.blade.php with show.blade.php? -->
			</tbody>
		</table>
		
	</div>
	
</div>
	@endsection