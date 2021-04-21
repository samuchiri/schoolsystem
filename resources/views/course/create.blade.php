@extends('layouts.app1')
@section('content')
<div class="row content-justify-center">
	<div class="col-sm-6">
		<form action="/course" method="POST">
			@csrf
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" class="form-control">
			</div>
			@csrf
			<div class="form-group">
				<label>Description</label>
				<textarea name="description" class="form-control" rows="5"></textarea>
			</div>
			<button type="submit" class="btn btn-sm btn-success">Save Course</button>
		</form>
	</div>
</div>
@endsection