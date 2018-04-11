<html>
	<head>
		<title>Aggiungi Dispositivo</title>
		<link rel="stylesheet" type="text/css" href="<?php echo CONFIG::$controllerPath."gruppo/ViewAggiungi.css" ?>">
	</head>
	<body>


		<div class="row">
 			<div class="col-sm-4">
				<form action="index.php?model=gruppo&action=add" method="post">
				    <center><h1>Aggiungi Gruppo</h1> <br></center>
  			    		SIGLA <input type="text" name="sigla"><br>
			   	 	descrizione<input type="text" name="descrizione"><br>               
					<br/><input type="submit" class="btn btn-dark" value="Aggiungi" name="submit" />
				</form>
				<p> <?php echo $error ?> </p>
			</div>
		</div>
	</body>
</html>
