@extends('layouts.app1')
@section('content')
<div class="row content-justify-center">
	<div class="col-sm-6">
		<form action="/course/{{$course->id}}" method="POST">
			@csrf
			<input type="hidden" name="_method" value="PUT">
			<!-- <input type="hidden" name="_method" value="PUT"> says method is PUT since we can not save PUT in method. THE ABOVE CODE (<input type="hidden" name="_method" value="PUT">) CAN ONLY BE ON THE EDIT/UPDATE PAGE. IT CAN ALSO BE WRITTEN AS @method('PUT') -->
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" class="form-control" value="{{$course->title}}">
			</div>
			@csrf
			<div class="form-group">
				<label>Description</label>
				<textarea name="description" class="form-control" rows="5">{{$course->description}}</textarea>
			</div>
			<button type="submit" class="btn btn-sm btn-success">Save Course</button>
		</form>
	</div>
</div>
@endsection