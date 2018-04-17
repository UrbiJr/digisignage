<html>
	<head>
		<title>Aggiungi Azienda</title>
		<link rel="stylesheet" type="text/css" href="<?php echo CONFIG::$controllerPath."gruppo/ViewAggiungi.css" ?>">
	</head>
	<body>
		<div class="row">
 			<div class="col-sm-4">
				<form action="index.php?model=azienda&action=add" method="post">
				    <center><h1>Aggiungi Azienda</h1> <br></center>
            Ragione Sociale<input type="text" name="ragione_sociale"><br>
					  <br/><input type="submit" class="btn btn-dark" value="Aggiungi" name="submit" />
				</form>
				<p> <?php echo $error ?> </p>
			</div>
		</div>
	</body>
</html>
