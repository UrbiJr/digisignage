<html>
	<head>
		<title>Modifica Dispositivo</title>
		<link rel="stylesheet" type="text/css" href="<?php echo CONFIG::$controllerPath."dispositivo/ViewAggiungi.css" ?>">
	</head>
	<body>


		<div class="row">
 			<div class="col-sm-4">
				<form action="index.php?model=gruppo&action=update" method="post">
					<h1 align="center">Modifica Gruppo</h1><br>
         	  		<input type="hidden" name="id" value=<?php echo($gruppo->getId());?>>
  			   	 	Reinserisci Sigla <input type="text" name="sigla" value=<?php echo($gruppo->getSigla()); ?>><br>
					Reinserisci descrizione <input type="text" name="descrizione" value=<?php echo($gruppo->getDescrizione()); ?>><br>
				    <input type="submit" class="btn btn-dark" value="Modifica" name="submit" />
				</form>
				<p> <?php echo $error ?> </p>
			</div>
		</div>
	</body>
</html>
