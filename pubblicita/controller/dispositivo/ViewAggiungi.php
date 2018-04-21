
		<div class="row">
 			<div class="form-container col-sm-4">
				<h1>Aggiungi dispositivo</h1>
				<h3>Inserisci i dati</h3>
				<form action="index.php?model=dispositivo&action=add" method="post">
  			    	Nome:<br/>
					<input type="text" name="nome"><br>
			   	 	Indirizzo mac:<br/>
					<input type="text" name="indirizzoMac"><br>
			  	    Indirizzo ip:<br/>
					<input type="text" name="indirizzoIp"><br>
           	 		Orientamento:<br/>
					<input type="text" name="orientamento"><br>
            		Gruppo:<br/>
					<select name="idGruppo">
	            		<?php foreach ($gruppi as $key=>$gruppo):?>
						<option value=<?php echo($key);?>> <?php echo ($gruppo->getSigla());?>
						<?php endforeach;?>
					</select>
					<br/><br/>
					<input type="submit" class="btn btn-dark" value="Aggiungi" name="submit" />
				</form>
				<p> <?php echo $error ?> </p>
			</div>
		</div>
