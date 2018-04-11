<html>
	<head>
		<title>Modifica Dispositivo</title>
		<link rel="stylesheet" type="text/css" href="<?php echo CONFIG::$controllerPath."dispositivo/ViewAggiungi.css" ?>">
	</head>
	<body>


		<div class="row">
 			<div class="col-sm-4">
				<form action="index.php?model=dispositivo&action=update" method="post">
					<h1 align="center">Modifica Dispositivo</h1><br>
         	  		<input type="hidden" name="id" value=<?php echo($dispositivo->getId());?>>
  			   	 	Reinserisci nome <input type="text" name="nome" value=<?php echo($dispositivo->getNome()); ?>><br>
				   	Reinserisci indirizzo mac <input type="text" name="indirizzoMac" value=<?php echo($dispositivo->getIndirizzoMac()); ?>><br>
			     	Reinserisci indirizzo ip <input type="text" name="indirizzoIp" value=<?php echo($dispositivo->getIndirizzoIp()); ?>><br>
    	       		Reinserisci orientamento <input type="text" name="orientamento" value=<?php echo($dispositivo->getOrientamento()); ?>><br>                
           			Reinserisci gruppo <select name="idGruppo"><br>
					<?php foreach ($gruppi as $key=>$gruppo):?>
					<option value=<?php echo ($key);?>
					<?php if($dispositivo->getIdGruppo()==$gruppo->getId()):
					echo ("selected");?> <?php endif;?>><?php echo($gruppo->getSigla())?></option>
					<?php endforeach;?>
				    <input type="submit" class="btn btn-dark" value="Modifica" name="submit" />
				</form>
				<p> <?php echo $error ?> </p>
			</div>
		</div>
	</body>
</html>
