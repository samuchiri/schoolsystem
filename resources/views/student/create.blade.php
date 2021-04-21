@extends('layouts.app1')
@section('content')
<div class="row content-justify-center">
	<div class="col-sm-6">
		<form action="/student" method="POST">
			@csrf
			<div class="form-group">
			<label>Name</label>
			<select class="form-select" name="user_id">
			@foreach ($users as $user)
			<option value="{{$user->id}}" name="name">{{$user->name}}</option>
			<!-- <option value="{{$user->id}}">{{$user->name}}</option> Pulls ALL users to the select box. We use "form select" to select items from a drop down -->
			@endforeach
			</select>
			</div>
			<div class="form-group">
			<label>Reg No</label>
			<div class="form-group">
			<input type="text" name="reg_no" class="form-control">
			</div>
			</div>

          <div class="form-group">
			<label>Course</label>
			<select class="form-select" name="course_id">
			@foreach ($courses as $course)
			<option value="{{$course->id}}">{{$course->title}}</option>
			@endforeach
			</select>
			</div>
			<!-- We only loop associated objects from a given Model. Eg in the create.blade.php, wechoose course_id and user_id (from the student model) as values -->

		<div class="form-group">
			<button type="submit" class="btn btn-sm btn-success">Save user</button>
		</div>
			
		</form>
	</div>
</div>
@endsection