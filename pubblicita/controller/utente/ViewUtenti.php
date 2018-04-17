</br>
<?php if($utenti):?>
	<h1 align="center">Utenti</h1></br>
	<div class="container">

		<table align="center" class="table table-dark table-hover">
			<tr>
				<th>Id</th>
				<th>Nome</th>
        <th>E-Mail</th>
        <th>Ruolo</th>
        <th>Azienda</th>
				<th>Elimina</th>
			</tr>
			<?php foreach($utenti as $key => $utenteN):?>
				<tr>
					<td><?php echo $key?></td>
					<td><?php echo $utenteN->getUsername();?></td>
          <td><?php echo $utenteN->getMail();?></td>
          <td><?php echo (RuoliTab::getById($utenteN->getIdRuolo()))->getDescrizione();?></td>
          <td><?php echo (AziendeTab::getById($utenteN->getIdAzienda()))->getRagioneSociale();?></td>
					<td><a onClick="return confirm('Sei sicuro?')" href="index.php?model=utente&id=<?php echo $key?>&action=delete">Elimina</a></td>
				</tr>
			<?php endforeach;?>
		</table>
	</div>
<?php else:?>
	<h1 align="center">Non ci sono utenti.</h1>
<?php endif;?>
<br>
<div style="margin: 0 auto; text-align: center">
	<a href="index.php?model=utente&action=new" style="font-size:20px">Aggiungi Utente</a><br><br>
</div>
