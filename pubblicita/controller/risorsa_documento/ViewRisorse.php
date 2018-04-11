</br>
		<?php if($risorse):?>
			<h1 align="center">Lista risorse</h1><br>
			<div class="container">
				<table align="center" class="table table-striped">
					<tr>
						<th>Id</th>
						<th>Nome</th>
						<th>Id Azienda</th>
						<th>Elimina</th>
					</tr>
					<?php foreach($risorse as $key => $risorsa):?>
						<tr>
							<td><?php echo $key?></td>
							<td><?php echo $risorsa->getNome();?></td>
							<td><?php echo $risorsa->getIdAzienda();?></td>
							<td><a onClick="return confirm('Sei sicuro')" href="index.php?model=risorsa_documento&id=<?php echo $key?>&action=delete">Elimina<a></td>
						</tr>
					<?php endforeach;?>
				</table>
			</div>
		<?php else:?>
			<h1 align="center">Non ci sono risorse.</h1>
		<?php endif;?>
		<br>
		<div style="margin: 0 auto; text-align: center">
			<a href="index.php?model=risorsa_documento&action=new" style="font-size:20px">Aggiungi risorsa</a><br><br>
			<?php if(@$message):?>
				<h2><?php echo $message?></h2>
			<?php endif;?>
		</div>
