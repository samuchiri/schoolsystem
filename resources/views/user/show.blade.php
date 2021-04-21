@extends('layouts.app1')
@section('content')
<div class="row content-justify-center">
	<div class="col-sm-6">
		<table class="table table-bordered">
			<tbody>
				<tr>
					<th>Name</th>
					<td>{{$user->name}}</td>
				</tr>
				<tr>
					<th>Email</th>
					<td>{{$user->email}}</td>
				</tr>
			</tbody>
		</table>
		@can('Update User')
		<a href="/user/{{$user->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
		@endcan
		<form action="/user/{{$user->id}}" method="POST">
			@csrf
			<input type="hidden" name="_method" value="DELETE">
			<!-- @method('DELETE') IS JUST THE SAME AS <input type="hidden" name="_method" value="DELETE"> -->
			<button type="submit" class="btn btn-sm btn-danger">Delete</button>
		</form>
	</div>
</div>
@endsection