
<div class="container-fluid">
<div class="row">
	<div class="col-sm-4"></div
		<div class="col-sm-4">
			<center>
				<h1 class="display-4">Carica Risorsa</h1>
			</center>
		</div>
	<div class="col-sm-4"></div>
</div>

<html>
	<head>
		<title>Carica Documento</title>
		<script type="text/javascript" src="js/bootstrap-filestyle.min.js"></script>
	</head>
	<body>

		<div class="row">

 			<div class="col-sm-4"></div>
 			<div class="col-sm-4">
				<center>
				<br>
					<h3>Seleziona la risorsa da caricare </h3> <br>
					<form action="index.php?model=risorsa_documento&action=add" method="post" enctype="multipart/form-data">
						<p>
							<input type="file" class="btn btnUpload" name="file" onchange="javascript: document.getElementById ('fileName') . value = this.value"/>
							<input type="hidden" name="action" value="add"/>
							<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
						</p>
						<p>
							<input type="submit" class="btn btn-dark" value="Aggiungi" name="submit" />
						</p>
					</form>
					<p> <?php echo $error ?> </p>

			</div>
 			<div class="col-sm-4"></div>
		</div>

	</div>
					<br>
					<h2><?php echo $error ?> </h2>
				</center>

</html>
