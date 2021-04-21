@extends('layouts.app1')
@section('content')
<div class="row content-justify-center">
	<div class="col-sm-6">

		<form action="/user" method="POST">
			@csrf
			<div class="form-group">
			<label>Name</label>
			<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group">
			<label>Role</label>
			<select class="form-select" name="role_id">
			@foreach ($roles as $role)
			<option value="{{$role->id}}" name="name">{{$role->name}}</option>

			@endforeach
			</select>
			</div>
			<div class="form-group">
			<label>Email</label>
			<input type="text" name="email" class="form-control">
			</div>
			<div class="form-group">
			<label>Phone</label>
			<input type="text" name="phone" class="form-control">
			</div>
			<div class="form-group">
			<label>Password</label>
			<input type="password" name="password" class="form-control">
			</div>
			<button type="submit" class="btn btn-sm btn-success">Save user</button>
		</form>
	</div>
</div>
@endsection