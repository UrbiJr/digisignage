<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		</br>
		<h1 align="center">Aggiungi immagine</h1><br>
		<div class="container center_div">
			<form action="index.php?model=risorsa_documento&action=add" method="POST" enctype="multipart/form-data">
				<p>Nome:</p>
				<input type="text" name="filename"/>
				<div class="form-group">
					<label>Seleziona immagine:</label>
					<input type="file" name="file" id="file"/>
				</div>
				<input type="hidden" name="action" value="add"/>
				<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
				<input type="submit" style="font-size:20px" class="btn btn-success center-block" value="Aggiungi"/>
			</form>
			</br>
		</div>
	</body>
</html>
