<html>
	<head>
		 <title>ProjectWork</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/util.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
  <style>


  .footer_mio {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: #222222;
    color: #f2f2f2;
    text-align: center;
    padding: 10px;
  }
  .navbar {
  	margin-bottom: 50px;
  	border-radius: 0;
  }


  </style>
	</head>
	<body>

  <center>  <h1>ProjectWork</h1></center>



<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">

      <ul class="nav navbar-nav">
        <li><a href="index.php?model=login&action=home">Home</a></li>
        <li><a href="index.php?model=risorsa_documento&action=new">Carica File</a></li>
        <li><a href="index.php?model=risorsa_immagine&action=new">Carica Immagine</a></li>
        <li><a href="#">Ordina</a></li>
        <li><a href="#">Visualizza</a></li>
        <li><a href="#">Modifica</a></li>
			</ul>


      <ul class="nav navbar-nav navbar-right">
        <li  style="right: 0px;"><a href="index.php?model=login&action=logout"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <div class="row">

  </div>
</div><br>

</div><br><br>
<?php echo $content ?>


<div class="footer_mio">
  <p>Realizzato dalla classe 5AIN dell' ITIS E.Mattei di Urbino</p>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="vendor/animsition/js/animsition.min.js"></script>
<script src="vendor/select2/select2.min.js"></script>
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<script src="vendor/countdowntime/countdowntime.js"></script>
<script src="js/main.js"></script>
	</body>
</html>
