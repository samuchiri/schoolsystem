@extends('layouts.app1')
@section('content')

<div class="row content-justify-center">
	<div class="col-sm-6">
		<table class="table table-bordered">
			<tbody>
				<th>#</th>
				<tr><th>Name</th><td>{{$course->title}}</td></tr>
				<tr><th>Description</th><td>{{$course->description}}</td></tr>
				<tr><th>Created At</th><td>{{$course->created_at}}</td></tr>
				<!-- This Page is a show page that shows the individual record detail from the index.blade.php. Once a user clicks "view" he's directed here -->
			</tbody>
		</table>
		<div class="btn btn-group">
		<a href="/course/{{$course->id}}/edit" class="btn btn-sm btn-success">Edit</a>
		<form action="/course/{{$course->id}}" method="POST">
			<!-- When you go to your terminal and type php artisan route:list, there will be a list of all the methods you've used. In this case, we've specified that our method is "POST" thus we are directed to store -->
			@csrf
			<input type="hidden" name="_method" value="DELETE">
			<button class="btn btn-sm btn-danger" type="submit">Delete</button>
		</form>
		</div>
	

		<!-- FOREACH is a loop. Loops run when there's a one to many relationship BUT NOT ONE TO ONE relationship -->
	</div>
	
</div>
@endsection
		

	