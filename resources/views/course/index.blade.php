@extends('layouts.app1')
@section('content')

<div class="row content-justify-center">
	<div class="col-sm-6">
		<a href="/course/create" class="btn btn-sm btn-success"> Create Course</a>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Description</th>
					<th>Created At</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($courses as $course)
				<!-- $courses is sent from course controller. If it were course (as in in singular form in the controller,) we should not LOOP. Use loops for Plural objects but not singular objects  -->
				<tr>
					<td></td>
					<td>{{$course->title}}</td>
					<td>{{$course->description}}</td>
					<td>{{$course->created_at}}</td>
					<td><a href="/course/{{$course->id}}" class="btn btn-sm btn-info">View</a></td>
					<!-- when you click you are directed to a show page. To create a table in laravel, use FOR EACH loop -->
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	
</div>
@endsection