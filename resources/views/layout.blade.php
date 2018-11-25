<!DOCTYPE html>
<html lang="en">
	<head>
    <!-- Required meta tags -->
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<!-- Font -->
		<link href="https://fonts.googleapis.com/css?family=Oswald|Raleway" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/styles.css')}}">

    <!-- Customized CSS -->
    	<!-- <link rel="stylesheet" href="../assets/css/styles.css"> -->

	<!-- jQuery -->
		<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

    <!-- Customized JavaScript -->



    	<title>@yield('title','f\'lm House')</title>
	</head>
	<body>
    
        <div class="container-fluid">
            <nav id="headingNav" class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
                <div class="container">
                    <span class="navbar-text">
                        <a href="/" class="navbar-brand">f'lm House</a>
                    </span>
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#mainNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div id="mainNav" class="collapse navbar-collapse ml-auto">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a href="/" class="nav-link">Movies</a>
                            </li>
{{--                             <li class="nav-item">
                                <a href="#" class="nav-link">Cinema</a>
                            </li> --}}
                            <li class="nav-item">
                                <a href="/login" class="nav-link">Log-in</a>
                            </li>
                            <li class="nav-item">
                                <a href="/register" class="nav-link">Register</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    
        <div class="container">
        	@yield('content')
        </div>

        
        <div class="container-fluid">
            
            <footer id="footer">
                <div class="container-fluid footer">
                    <div class="container">
                        <p>Movies</p>
                        <ul class="linksList">
                            <li><a class="link" href="#">Now Playing</a></li>
                            <li><a class="link" href="#">Coming Soon</a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- custom JS --> 
        <script>
        	
        </script>   
  	</body>
</html>