@extends('layouts.app1')
@section('content')
<div class="container">
	<div class="row content-justify-center">
	<div class="col-sm-6">
		<form action="/sms" method="POST">
			@csrf
			<div class="form-group">
			<label>Contacts</label>
			<div class="form-group">
			<input type="text" name="contact" class="form-control">
			</div>
			</div>
			<div class="form-group">
			<label>Message</label>
			<div class="form-group">
			<textarea class="form-control" name="sms" rows='5'></textarea>

			</div>
			</div>
         		
		<div class="form-group">
			<button type="submit" class="btn btn-sm btn-success">Send message</button>
		</div>
			
		</form>
	</div>
</div>
	
</div>

@endsection