@extends('layouts.app1')
@section('content')

<div class="row content-justify-center">
	<div class="col-sm-6">
		<a href="/user/create" class="btn btn-sm btn-success"> Create user</a>
		<table class="table table-bordered table-condensed">
			<thead>
				
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr>
					<td></td>
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
					<td>{{$user->phone}}</td>
					<td><a href="/user/{{$user->id}}" class="btn btn-sm btn-info">View</a></td>
					<!-- when you click you are directed to a show page. To create a table in laravel, use FOR EACH loop -->
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	
</div>
@endsection