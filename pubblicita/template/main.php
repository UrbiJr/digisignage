<html>
	<head>
		 <title>ProjectWork</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<<<<<<< HEAD
  <link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.css">
=======
  <link rel="stylesheet" href="bootstrap-4.0.0/css/bootstrap.min.css">
>>>>>>> 31d47e62e10854124cdee227fb2cafc942a7b78f
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

  <center>  <img src="images/logone.png" height="150" width="600"></center>




  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
        <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php?model=login&action=home"><img src="images/loghino.png" height="25" width="25"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?model=risorsa_documento&action=new">Carica Risorsa</a>
        </li>
      <!--  <li class="nav-item">
          <a class="nav-link" href="index.php?model=risorsa_immagine&action=new">Carica Immagine</a>
        </li>-->
        <li class="nav-item">
          <a class="nav-link" href="#">Ordina</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?model=risorsa_documento&action=list">Visualizza</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Modifica</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Gestisci gruppo</a>
        </li>
			</ul>



        <li  style="right: 0px;"><a href="index.php?model=login&action=logout"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<?php echo $content ?>


<div class="footer_mio">
<p>Realizzato dalla classe 5AIN dell' ITIS E.Mattei di Urbino</p>
</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="bootstrap-4.0.0/js/bootstrap.min.js"></script>
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <script src="js/main.js"></script>
	</body>
</html>
