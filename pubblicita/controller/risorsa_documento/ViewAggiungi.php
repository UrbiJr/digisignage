<div class="row">
 			<div class="col-sm-4"></div>
 			<div class="col-sm-4">
				<center>
					<form action="index.php?model=risorsa_documento&action=add" method="post" enctype="multipart/form-data">
						Seleziona immagine:
						<input type="file" name="file"/>
						<input type="hidden" name="action" value="add"/>
						<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
						<input type="submit" class="btn btn-dark" value="Aggiungi" name="submit" />

					</form>
					<p> <?php echo $error ?> </p>
				</center>
			</div>
 			<div class="col-sm-4"></div>
		</div>
