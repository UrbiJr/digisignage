</br>
<?php if($gruppi):?>
	<h1 align="center">Gruppi</h1><br>
	<div class="container">
		<table align="center"s class="table table-dark table-hover">
			<tr>
				<th>Id</th>
				<th>Sigla</th>
				<th>Descrizione</th>
 	 	    <th>Modifica</th>
				<th>Elimina</th>
			</tr>
			<?php foreach($gruppi as $key => $gruppo1):?>
				<tr>
					<td><?php echo $key?></td>
					<td><?php echo $gruppo1->getSigla();?></td>
					<td><?php echo $gruppo1->getDescrizione();?></td>
          <td><a href="index.php?model=gruppo&id=<?php echo $key?>&action=edit">Modifica<a></td>
					<td><a onClick="return confirm('Sei sicuro?')" href="index.php?model=gruppo&id=<?php echo $key?>&action=delete">Elimina<a></td>
				</tr>
			<?php endforeach;?>
		</table>
	</div>
<?php else:?>
	<h1 align="center">Non ci sono gruppi.</h1>
<?php endif;?>
<br>
<div style="margin: 0 auto; text-align: center">
	<a href="index.php?model=gruppo&action=new" style="font-size:20px">Aggiungi gruppo</a><br><br>
</div>
