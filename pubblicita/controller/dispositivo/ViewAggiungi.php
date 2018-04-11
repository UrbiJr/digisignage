<html>
	<head>
		<title>Aggiungi Dispositivo</title>
		<link rel="stylesheet" type="text/css" href="<?php echo CONFIG::$controllerPath."dispositivo/ViewAggiungi.css" ?>">
	</head>
	<body>


		<div class="row">
 			<div class="col-sm-4">
				<form action="index.php?model=dispositivo&action=add" method="post">
				    <center><h1>Aggiungi Dispositivo</h1> <br></center>
  			    	Inserisci nome <input type="text" name="nome"><br>
			   	 	Inserisci indirizzo mac <input type="text" name="indirizzoMac"><br>
			  	    Inserisci indirizzo ip <input type="text" name="indirizzoIp"><br>
           	 		Inserisci orientamento <input type="text" name="orientamento"><br>                
            		Inserisci gruppo <select name="idGruppo">
            		<?php foreach ($gruppi as $key=>$gruppo):?>
					<option value=<?php echo($key);?>> <?php echo ($gruppo->getSigla());?>
					<?php endforeach;?>
					<p>
					<br/><input type="submit" class="btn btn-dark" value="Aggiungi" name="submit" />
				</form>
				<p> <?php echo $error ?> </p>
			</div>
		</div>
	</body>
</html>
