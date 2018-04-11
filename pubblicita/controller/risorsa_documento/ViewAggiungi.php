<html>
	<head>
		<title>Carica Documento</title>
<<<<<<< HEAD
		<link rel="stylesheet" type="text/css" href="css/ViewAggiungi.css">
		<script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>
=======
		<script type="text/javascript" src="js/bootstrap-filestyle.min.js"></script>
>>>>>>> e58c5256b386b7caf27b52e0938f53cc814e64cc
	</head>
	<body>

		<div class="row">

 			<div class="col-sm-4"></div>
 			<div class="col-sm-4">
				<center>
				<br>
<<<<<<< HEAD
					<h1><i>Carica risorsa</i></h1> <br>
					<h3>Seleziona la risorsa da caricare </h3> <br>
					<form action="index.php?model=risorsa_documento&action=add" method="post" enctype="multipart/form-data">
<div><input type='file' class="btn btnUpload"title="Choose a video please" id="aa" onchange="pressed()"><label id="fileLabel"></label></div>
						<p>
							<input type="hidden" name="action" value="add"/> 
=======
					<h3>Seleziona la risorsa da caricare </h3> <br>
					<form action="index.php?model=risorsa_documento&action=add" method="post" enctype="multipart/form-data">
						<p>
							<input type="file" class="btn btnUpload" name="file" onchange="javascript: document.getElementById ('fileName') . value = this.value"/>
							<input type="hidden" name="action" value="add"/>
>>>>>>> e58c5256b386b7caf27b52e0938f53cc814e64cc
							<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
						</p>
						<p>
							<input type="submit" class="btn btn-dark" value="Aggiungi" name="submit" />
						</p>
					</form>
					<br>
					<h2><?php echo $error; ?> </h2>
				</center>

<<<<<<< HEAD
=======
			</div>
 			<div class="col-sm-4"></div>
		</div>

	</div>
					<br>
					<h2><?php echo $error ?> </h2>
				</center>

>>>>>>> e58c5256b386b7caf27b52e0938f53cc814e64cc
</html>
