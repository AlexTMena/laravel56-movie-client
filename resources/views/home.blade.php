@extends('layout')

@section('content')
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<img src="#" alt="poster">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores distinctio, a incidunt veritatis molestias magni iure cum, maxime nulla, nihil adipisci expedita, veniam nostrum. Ratione repellat, temporibus voluptate atque. Libero.</p>
				</div>
				<div class="col-sm-12 col-md-6">
					<div class="announcement-cont d-flex 
						align-items-center justify-content-center">
							<div class="">
								<h1 class="">Announcement</h1>
							</div>
						</div>
				</div>

			</div>
		</div>
	</div>

	<div id="movieCategory" class="container">
		<div class="movie-category row text-center">
			<a class="d-inline col-4 active-cat">Now Showing</a>
			<a class="d-inline col-4">Comming Soon</a>
			<a class="d-inline col-4">Search Movie</a>
		</div>
	</div>

	<div class="container">
		<h1>Movie List</h1>
		<div class="text-center row" id="movieList">
{{-- 			<div class="col-sm-12 col-md-4 col-lg-3">

				<img class="d-block" src="#" alt="movie">
				<a href="/single-movie" class="link">Buy</a>				
			</div> --}}
			
		</div>
	</div>
	<script>
		
		var myList = document.querySelector('#movieList');

			const getMovie = () => {
				return fetch('http://localhost:8001/movies')
				.then(response => response.json())
				.then(movies => {
					JSON.stringify(movies);
					console.log(movies);
					for (var i = 0; i < movies.length; i++){

						var listMovie = document.createElement('div');
						listMovie.setAttribute('class', 'col-sm-12 col-md-4 col-lg-3');
						var itemImg = document.createElement('img');
						itemImg.classList.add('poster');
						itemImg.setAttribute('src','./svg/' + (movies[i].id - 1) + '.jpg');
						var itemAnchor = document.createElement('a');
						itemAnchor.setAttribute('href', 'http://localhost:8000/single-movie/' + (movies[i].id -1));
						itemAnchor.innerHTML= 'Buy';
						itemAnchor.classList.add('link');


						// listMovie.innerHTML = '<h3>' +  movies[i].name + '</h3>' + '<p>' + movies[i].description+ '</p></div>';
						myList.appendChild(listMovie);
						listMovie.appendChild(itemImg);
						listMovie.appendChild(itemAnchor);

					}
				})
			};

			getMovie();
		
	</script>

@endsection