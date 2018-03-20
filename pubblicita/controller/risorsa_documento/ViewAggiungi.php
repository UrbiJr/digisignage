<html>
	<head>
		<title>Carica Documento</title>
	</head>
	<body>
		Nome:<input type="text" name="nome">
		<form action="controller.php?model=" method="post" enctype="multipart/form-data">
		Select image to upload:
		<input type="file" name="userfile">
		<input type="submit" value="Upload Image" name="submit">
	</form>
	
	</body>
</html>
