@extends('layouts.app1')
@section('content')
<div class="row content-justify-center">
	<div class="col-sm-6">

		<form action="/user/{{$user->id}}" method="POST">
			@csrf
			<input type="hidden" name="_method" value="PUT">
			<!-- <input type="hidden" name="_method" value="PUT"> CAN ALSO BE WRITTEN AS @method('PUT') FROM LARAVEL 7. THE ABOVE CODE (<input type="hidden" name="_method" value="PUT">) CAN ONLY BE ON THE UPDATE/EDIT PAGE -->
			<div class="form-group">
			<label>Name</label>
			<input type="text" name="name" class="form-control" value="{{$user->name}}">
			</div>
			<div class="form-group">
			<label>Email</label>
			<input type="text" name="email" class="form-control"  value="{{$user->email}}">
			</div>
			<div class="form-group">
			<label>Phone</label>
			<input type="text" name="phone" class="form-control">
			</div>
			<div class="form-group">
			<label>Password</label>
			<input type="password" name="password" class="form-control">
			</div>
			<button class="btn btn-sm btn-success" type="submit">Update User</button>
		</form>
			<!-- "{{$user->id}} identifies the particular user -->
@endsection