<html>
	<head>
		<title>Carica Documento</title>
		<style>
	     input[type='file'] {
  				color: transparent;
				}



	    </style>

	</head>
	<body>

	<form>
		<div class="row">
 			<div class="col-sm-4"></div>
 			<div class="col-sm-4">

						<div class="form-group">
		 					<label for="email">Seleziona immagine:</label>
		 					<input type="file" name="file"/>
 							<input type="hidden" name="action" value="add"/>
 							<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
	 					</div>
						<input type="submit" class="btn btn-dark" value="Aggiungi" name="submit"/>
					</form>
				
			</div>
 			<div class="col-sm-4"></div>
		</div>
	</body>
</html>
