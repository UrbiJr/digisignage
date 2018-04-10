<html>
	<head>
		<title>Carica Documento</title>
		<link rel="stylesheet" type="text/css" href="<?php echo CONFIG::$controllerPath."risorsa_documento/ViewAggiungi.css" ?>">
	</head>
	<body>

		<div class="row">
 			<div class="col-sm-4"></div>
 			<div class="col-sm-4">
				<center>
					<form action="index.php?model=risorsa_documento&action=add" method="post" enctype="multipart/form-data">
						<h1>Seleziona un file</h1> <br>
						<p>
							<input type="file" class="btnUpload" name="file"/>
							<input type="hidden" name="action" value="add"/> 
							<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
						</p>
						<p>
							<input type="submit" class="btn btn-dark" value="Aggiungi" name="submit" />
						</p>
						
					</form>
					<p> <?php echo $error ?> </p>
				</center>
			</div>
 			<div class="col-sm-4"></div>
		</div>
	</body>
</html>
