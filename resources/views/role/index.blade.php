@extends('layouts.app1')
@section('content')
<div class="container">
		<a href="/role/create" class="btn btn-sm btn-success"> Create Role</a>
		
		
			<table class="table table-bordered">
				<thead>
				<tr>
				<th>Role</th>
				<th>Action</th>
				</tr>

			@foreach($roles as $role)
			<tr>
				<td>{{$role->name}}</td>
				
				<td><a href="/role/{{$role->id}}" class="btn btn-sm btn-info">View</a></td>
			</tr>
				@endforeach
				</thead>
			
					
			</table>

	</div>

@endsection