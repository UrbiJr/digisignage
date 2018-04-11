<html>
	<head>
		<title>Modifica Dispositivo</title>
		<link rel="stylesheet" type="text/css" href="css/dispositivo/dispositivo.css">
	</head>
	<body>


		<div class="row">
 			<div class="form-container col-sm-4">
				<h1>Modifica dispositivo</h1>
				<h3>Modifica i dati</h3>
				<form action="index.php?model=dispositivo&action=update" method="post">
         	  		<input type="hidden" name="id" value=<?php echo($dispositivo->getId());?>>
  			   	 	Nome:</br>
					<input type="text" name="nome" value=<?php echo($dispositivo->getNome()); ?>><br>
				   	Indirizzo mac:</br>
					<input type="text" name="indirizzoMac" value=<?php echo($dispositivo->getIndirizzoMac()); ?>><br>
			     	Indirizzo ip:</br>
					<input type="text" name="indirizzoIp" value=<?php echo($dispositivo->getIndirizzoIp()); ?>><br>
    	       		Orientamento:<br/>
					<input type="text" name="orientamento" value=<?php echo($dispositivo->getOrientamento()); ?>><br>
           			Gruppo:<br/>
					<select name="idGruppo"><br>
						<?php foreach ($gruppi as $key=>$gruppo):?>
						<option value=<?php echo ($key);?>
						<?php if($dispositivo->getIdGruppo()==$gruppo->getId()):
						echo ("selected");?> <?php endif;?>><?php echo($gruppo->getSigla())?></option>
						<?php endforeach;?>
					</select>
					<br/><br/>
				    <input type="submit" class="btn btn-dark" value="Modifica" name="submit" />
				</form>
				<p> <?php echo $error ?> </p>
			</div>
		</div>
	</body>
</html>
