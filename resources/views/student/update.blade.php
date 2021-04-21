@extends('layouts.app1')
@section('content')
<div class="row content-justify-center">
	<div class="col-sm-6">
		<form action="/student/{{$student->id}}" method="POST">
			@csrf
		<input type="hidden" name="_method" value="PUT">
		<!-- THE ABOVE CODE (<input type="hidden" name="_method" value="PUT">) IS ONLY AVAILABLE ON THE update.blade.php PAGE AND NOT ANY OTHER PAGE -->
			<div class="form-group">
			<label>Registration number</label>
			<input type="text"  name="reg_no" class="form-control" value="{{$student->reg_no}}">
		</div>
		<div class="form-group">
			<label>user</label>
			<select class="form-select" name="user_id"></select>
			@foreach ($users as $user)
			@if($user->id==$student->user_id)
			<option value="{{$user->id}}" selected="selected"> {{$user->name}}</option>
			@else
			<option value="{{$user->id}}">{{$user->name}}</option>
			@endif
			@endforeach
		</select>
			</div>
			<div class="form-group">
			<label>Course</label>
			<select class="form-select" name="course_id">
				@foreach($courses as $course)
				@if($course->id==$student->course_id)
				<option value="{{course->id}}"selected="selected">{{$course->title}}</option>
				@else
				<option value="{{course->id}}">{{$course->title}}</option>
				@endif
				@endforeach
			</select>
			</div>
			<button type="submit" class="btn btn-sm btn-success">Save user</button>
		</form>
	</div>
</div>
	@endsection