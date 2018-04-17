<html>
	<head>
		<title>Aggiungi Utente</title>
		<link rel="stylesheet" type="text/css" href="<?php echo CONFIG::$controllerPath."gruppo/ViewAggiungi.css" ?>">
	</head>
	<body>
		<div class="row">
 			<div class="col-sm-4">
				<form action="index.php?model=utente&action=add" method="post">
				    <center><h1>Aggiungi Utente</h1> <br></center>
            Username<input type="text" name="nome"><br>
            E-Mail<input type="mail" name="mail"><br>
            Password<input type="password" name="password"><br>
						<?php $ruolo=RuoliTab::getById($utente->getIdRuolo());?>
            <?php if($ruolo->getCodice()==30):?>
              Azienda<select name="id_a">
  				    <?php foreach($elenco as $azienda):?>
  					         <option value="<?php echo $azienda->getId();?>"><?php echo $azienda->getRagioneSociale();?></option>
  				    <?php endforeach?>
              <input type="hidden" value="20" name="ruolo">
            <?php elseif($ruolo->getCodice()==20):?>
              <input type="hidden" value="10" name="ruolo">
              <input type="hidden" value="<?php echo $utente->getIdAzienda();?>" name="id_a">
            <?php endif;?>
					  <br/><input type="submit" class="btn btn-dark" value="Aggiungi" name="submit" />
				</form>
				<p> <?php echo $error ?> </p>
			</div>
		</div>
	</body>
</html>
