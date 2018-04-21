</br>
<?php if($aziende):?>
	<h1 align="center">Aziende</h1></br>
	<div class="container">

		<table align="center" class="table table-dark table-hover">
			<tr>
				<th>Id</th>
				<th>Ragione Sociale</th>
				<th>Elimina</th>
			</tr>
			<?php foreach($aziende as $key => $azienda):?>
				<tr>
					<td><?php echo $key?></td>
					<td><?php echo $azienda->getRagioneSociale();?></td>
					<td><a onClick="return confirm('Sei sicuro?')" href="index.php?model=azienda&id=<?php echo $key?>&action=delete">Elimina</a></td>
				</tr>
			<?php endforeach;?>
		</table>
	</div>
<?php else:?>
	<h1 align="center">Non ci sono aziende.</h1>
<?php endif;?>
<br>
<div style="margin: 0 auto; text-align: center">
	<a href="index.php?model=azienda&action=new" style="font-size:20px">Aggiungi azienda</a><br><br>
</div>
