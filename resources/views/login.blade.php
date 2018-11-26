@extends('layout')

@section('content')

<div class="row">
	<div class="col-12">	
		<form class="form-group" action="">
			<div class="col-md-6">
				<label for="email">Email</label><br>
				<input type="text" name="email" class="form-control" id="email">
			</div>

			<div class="col-md-6">
				<label for="password">Password</label><br>
				<input type="text" name="password" class="form-control" id="password">
			</div>

			<a class="btn btn-success" href="#" id="register" onclick="register()">Register</a>
		</form>
	</div>

	<script>
		function register() {
			let email = document.getElementById('email').value
			let password = document.getElementById('password').value;

			var url = 'http://localhost:8001/api/register';
			const data = {
				"email": email,
				"password": password,
			};

			fetch(url, {
				method: 'POST',
				body: JSON.stringify(data),
				headers:{'Content-Type': 'application/json'}
				})
			.then(response => response.json())
			.then(users => console.log('Success:', JSON.stringify(response)))
			.catch(error => console.error('Error:', error));
		};
	</script>

@endsection