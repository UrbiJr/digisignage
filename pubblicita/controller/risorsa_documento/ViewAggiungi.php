<html>
	<head>
		<title>Carica Documento</title>


	</head>
	<body>

		<div class="row">
 			<div class="col-sm-4"></div>
 			<div class="col-sm-4">
				<center>
					<form action="index.php?model=risorsa_documento&action=add" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="email">Nome del file:</label>
							<input class="form-control" type="test" name="filename">
						</div>
						<div class="form-group">
							<input class="form-control" type="file" name="userfile">
						</div>
						<div class="form-group">
							<input class="form-control btn btn-dark"  type="submit" value="Upload Image" name="submit">
 						</div>


					</form>
				</center>
			</div>
 			<div class="col-sm-4"></div>
		</div>
	</body>
</html>
