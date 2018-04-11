</br>
<?php if($dispositivi):?>
	<h1 align="center">Dispositivi</h1><br>
	<div class="container">
		<table class="table table-striped">
			<tr>
				<th>Id</th>
				<th>Nome</th>
				<th>Indirizzo Mac</th>
				<th>Indirizzo Ip</th>
				<th>Orientamento</th>
				<th>Gruppo</th>
 	 	     	<th>Modifica</th>
				<th>Elimina</th>
			</tr>
			<?php foreach($dispositivi as $key => $disp):?>
				<tr>
					<td><?php echo $key?></td>
					<td><?php echo $disp->getNome();?></td>
					<td><?php echo $disp->getIndirizzoMac();?></td>
					<td><?php echo $disp->getIndirizzoIp();?></td>
					<td><?php echo $disp->getOrientamento();?></td>
					<td><?php echo $disp->getGruppo()->getSigla();?></td>
            		<td><a href="index.php?model=dispositivo&id=<?php echo $key?>&action=edit">Modifica<a></td>
					<td><a onClick="return confirm('Sei sicuro?')" href="index.php?model=dispositivo&id=<?php echo $key?>&action=delete">Elimina<a></td>
				</tr>
			<?php endforeach;?>
		</table>
	</div>
<?php else:?>
	<h1 align="center">Non ci sono dispositivi.</h1>
<?php endif;?>
<br>
<div style="margin: 0 auto; text-align: center">
	<a href="index.php?model=dispositivo&action=new" style="font-size:20px">Aggiungi dispositivo</a><br><br>
</div>
