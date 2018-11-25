@extends('layout')

@section('content')

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
                            <a href="/" class="nav-link" id="movies">Movies</a>
                        </li>
                        <li class="nav-item">
                            <a href="/login" class="nav-link" id="login">Log-in</a>
                        </li>
                        <li class="nav-item">
                            <a href="/register" class="nav-link" id="register">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col col-12">
					<img src="#" alt="poster">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores distinctio, a incidunt veritatis molestias magni iure cum, maxime nulla, nihil adipisci expedita, veniam nostrum. Ratione repellat, temporibus voluptate atque. Libero.</p>
				</div>
				<div class="col-sm-12 col col-12">
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


	<div class="container" id="content">
		<h1>Movie List</h1>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            </tr>
            <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            </tr>
            <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            </tr>
        </tbody>
        </table>
	</div>

    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="form-group" id="loginForm">
        <div class="col col-12">
            <label for="email">Email</label><br>
            <input type="text" name="email" class="form-control" id="email">
        </div>

        <div class="col col-12">
            <label for="password">Password</label><br>
            <input type="password" name="password" class="form-control" id="password">
        </div>
     </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="sendLoginRequest">Login</button>
      </div>
    </div>
  </div>
</div>
	<script>

        var app = (function( document, window, $, Mustache ) {

            function app( document, window, $, Mustache ) {
                this.showLoginLink = $('#login');
                this.loginModal = $('#loginModal');
                this.loginForm = $('#loginForm');
                this.sendLoginRequestLink = $('#sendLoginRequest');
                this.invokeMovieList = $('#movies');
                this.invokeRegister = $('#register');
                this.authToken = false;
                this.authName = null;
            }

            app.prototype.init = function() {
                var that = this;
                that.showLoginFormOnLinkClick();
                that.sendLoginRequestOnLoginClick();
            }

            app.prototype.setAuthToken = function(token) {
                this.authToken = token;
            }
            app.prototype.setAuthName = function(name) {
                this.authName = name;
            }

            app.prototype.sendLoginRequestOnLoginClick = function() {
                var that = this;
                that.sendLoginRequestLink.on( 'click',  function(e) {
                    console.log('sending Login Request');
                    e.preventDefault();
                    let emailValue = that.loginForm.find( 'input[name="email"]' ).val();
                    let passwordValue = that.loginForm.find( 'input[name="password"]' ).val();
                    let payload = { 'email' : emailValue, 'password' : passwordValue };
                    console.log(payload);
                    const loginEndPoint = 'http://127.0.0.1:8001/api/login';
                    that.helperPostData(loginEndPoint, payload)
                    .then( function(data) {
                        that.setAuthToken( data.api_token );
                        that.loginModal.modal('hide');
                        console.log( 'authToken is set to ' + that.authToken );
                    } ) // JSON-string from `response.json()` call
                    .catch(error => console.error(error));
                });
            }

            app.prototype.showLoginFormOnLinkClick = function() {
                var that = this;
                that.showLoginLink.on( 'click',  function(e) {
                    e.preventDefault();
                    that.loginModal.modal();
                } );
            }

            app.prototype.listMovies = function() {
                var that = this;

            }

            /**
             * @see https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch#Supplying_request_options
             */
            app.prototype.helperPostData = function(url = ``, data = {}) {
            // Default options are marked with *
                return fetch(url, {
                    method: "POST", // *GET, POST, PUT, DELETE, etc.
                    mode: "cors", // no-cors, cors, *same-origin
                    cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
                    credentials: "same-origin", // include, *same-origin, omit
                    headers: {
                        "Content-Type": "application/json; charset=utf-8",
                        // "Content-Type": "application/x-www-form-urlencoded",
                    },
                    redirect: "follow", // manual, *follow, error
                    referrer: "no-referrer", // no-referrer, *client
                    body: JSON.stringify(data), // body data type must match "Content-Type" header
                })
                .then(response => response.json()); // parses response to JSON
            }

            return app;

        })(document, window, jQuery, Mustache);

        var spa = new app( document, window, jQuery, Mustache );
        spa.init();
	</script>

@endsection
