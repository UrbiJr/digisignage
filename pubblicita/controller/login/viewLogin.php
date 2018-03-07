<html>
  <head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./css/login.css">
  </head>
  <body>
    <div id="fullscreen_bg" class="fullscreen_bg"/>

    <div class="container">

    	<form class="form-signin" action="index.php?model=login?action=postLogin" method="POST">
    		<h1 class="form-signin-heading text-muted">Sign In</h1>
    		<input type="text" name="nome" class="form-control" placeholder="Email address" required="" autofocus="">
    		<input type="password" name="password" class="form-control" placeholder="Password" required="">
    		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button>
			<!---<a href="registration.php">Registrati!</a>--->
		</form>

    </div>
  <body>
</html>
