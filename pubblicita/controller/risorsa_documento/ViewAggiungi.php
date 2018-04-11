<div class="container-fluid">
<div class="row">
	<div class="col-sm-4"></div
		<div class="col-sm-4">
			<center>
				<h1 class="display-4">Carica Risorsa</h1>
			</center>
		</div>
	<div class="col-sm-4"></div>
</div>
<div class="row">
 			<div class="col-sm-4"></div>
 			<div class="col-sm-4">
				
					<form action="index.php?model=risorsa_documento&action=add" method="post" enctype="multipart/form-data">
						Seleziona immagine:
						<input type="file" name="file"/>
						<input type="hidden" name="action" value="add"/>
						<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
						<div class="row">
							<div class="col-sm-4"></div>
							<div class="col-sm-4"><input type="submit" class="btn btn-dark" value="Aggiungi" name="submit" /></div>
							<div class="col-sm-4"></div>
					</div>

					</form>
					<p> <?php echo $error ?> </p>

			</div>
 			<div class="col-sm-4"></div>
		</div>
	</div>
