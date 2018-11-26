@extends('layout')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-6">
				<div id="movieDisplay">	
{{-- 					<h2>name of movie</h2>
					<h4>Showing date | Movie length</h4>
					<p>Description of movie</p> --}}
				</div>
				<label for="branch">Branch</label>
				<select name="branch" id="branch">
					<option value="idNumber1">Branch1</option>
					<option value="idNumber2">Branch2</option>
					<option value="idNumber3">Branch3</option>
				</select>
				
				<label for="experience">Experience</label>
				<select name="experience" id="experience">
					<option value="idNumber1">experience1</option>
					<option value="idNumber2">experience2</option>
					<option value="idNumber3">experience3</option>
				</select>

			</div>
			<div class="col-sm-12 col-md-6">

				<img class="poster" src="/svg/{{ $id }}.jpg" alt="waw">
				<a href="/orderForm">Buy</a>
			</div>
		</div>
	</div>

	<script>
		console.log({{ $id }});

		var movieCont = document.querySelector('#movieDisplay');

			const getMovie = () => {
				return fetch('http://localhost:8001/movies')
				.then(response => response.json())
				.then(movies => {
					JSON.stringify(movies);

					var movieName = document.createElement('h2');
					movieName.innerHTML= movies[{{ $id }}].name;
					var movieDesc = document.createElement('p');
					movieDesc.innerHTML= movies[{{ $id }}].description;

					movieCont.appendChild(movieName);
					movieCont.appendChild(movieDesc)


					// for (var i = 0; i < movies.length; i++){

					// 	var listMovie = document.createElement('div');
					// 	listMovie.setAttribute('class', 'col-sm-12 col-md-4 col-lg-3');
					// 	var itemImg = document.createElement('img');
					// 	itemImg.classList.add('d-block');
					// 	itemImg.setAttribute('src','movie' + movies[i].id);
					// 	var itemAnchor = document.createElement('a');
					// 	itemAnchor.setAttribute('href', 'http://localhost:8000/single-movie/' + movies[i].id);
					// 	itemAnchor.innerHTML= 'Buy';
					// 	itemAnchor.classList.add('link');


					// 	// listMovie.innerHTML = '<h3>' +  movies[i].name + '</h3>' + '<p>' + movies[i].description+ '</p></div>';
					// 	myList.appendChild(listMovie);
					// 	listMovie.appendChild(itemImg);
					// 	listMovie.appendChild(itemAnchor);

					// }
				})
			};

			getMovie();

	</script>
@endsection