@extends('layouts.app1')
@section('content')
	<div class="container">
		@can('Create Student')
		<a href="/student/create" class="btn btn-sm btn-success"> Create Student</a>
		@endcan
		<table class="table table-bordered">
			<thead>
				<tr>
					
					<th>id</th>
					<th>Student name</th>
					<th>Registration_number</th>
					
					<th>Created_at</th>
					<th>Updated_at</th>
				</tr>
				@foreach($students as $student)
				<tr>
				<td>{{$student->id}}</td>
				<td>{{$student->user->name}}</td>
				<td>{{$student->reg_no}}</td>
			 	
				<td>{{$student->created_at}}</td>
				<td>{{$student->updated_at}}</td>
				<td><a href="/student/{{$student->id}}" class="btn btn-sm btn-info">View</a></td>
				</tr>
				@endforeach
				


			</thead>
		</table>
	</div>
@endsection