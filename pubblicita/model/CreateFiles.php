<?php
class CreateFiles{
	//file existing control
	public static function controlIfFileExists($fn){return file_exists($fn)?true:false;}

	//convert from word to pdf
	public function WordTopPdfConvert($fn){
		//if (! ( fileTypeConverter::controlIfFileExists($fn))){ return fileTypeConverter::FNE;}
		try{
			$result = shell_exec(("export HOME=/tmp && ".$this->CONVERT_COMMAND_WORD_TO_PDF." ".$fn));
		}catch(Exception $e){
			$result = $e->getMessage();
		}
		return $result;
	}

	/*	converte file documento in (piu') file jpeg.
		l'oggetto File passato per parametro acquisisce gli attributi
		dell'oggetto File della prima pagina jpeg convertita.
		ritorna true in caso di successo;
		null in caso di errore
		*/
	public static function convert($file) {
		//if (! (fileTypeConverter::controlIfFileExists($fn))){ return fileTypeConverter::FNE;}
		// estraggo il percorso (sottraendo il nome del file dal path)
		$destination = str_replace($file->getNome(),"",$file->getPath());
		$name = explode(".",$file->getNome())[0];
		try{
			// leggo numero pagine
			$nPages = (new Imagick($file->getPath()))->getNumberImages();
			$imagick = new Imagick();
			// maggiore qualita' immagine
			$imagick->setResolution(150, 150);
			// ciclo sul numero di pagine del documento
			for ($i = 0; $i < $nPages; $i++) {
				// nome corrente del nuovo file jpeg
				$currName = $name."-".$i.".jpeg";
				// leggi pagina numero $i del documento...
				$imagick->readImage($file->getPath()."[".$i."]");
				// aggiusta immagine
				$imagick = $imagick->flattenImages();
				// ... e trasformala in jpeg
				$imagick->writeImage($destination.$currName);
				// ora posso salvare il nuovo file nel database
				$temp = new File(null,$currName,"jpeg",$destination.$currName,$file->getIdRisorsa());
				$n = FileTab::insert($temp);
				$temp->setId($n);
				/*	 il file documento iniziale diventa il primo file jpeg convertito
					 (prima verifico che non sia assegnato l'id, come dovrebbe essere)
				*/
				if ($file->getId() == null) {
					$file->setId($temp->getId());
					$file->setNome($temp->getNome());
					$file->setTipo($temp->getTipo());
					$file->setPath($temp->getPath());
				}
			}

			$result = true;
		}catch(Exception $e){
			$result = false;
		}
		return $result;
	}

	//count all pages of pdf file
	public static function countPages($fn){
		//if (! (fileTypeConverter::controlIfFileExists($fn))){ return fileTypeConverter::FNE;}
		try{
			@$pdftext = file_get_contents($fn);
			$num = preg_match_all("/\/Page\W/", $pdftext, $dummy);
			$result = $num;
		}catch(Exception $e){
			$result = $e->getMessage();
		}
		return $result;
	}

	//convert one single page
	public function convertPage($page, $fn, $destination, $name){
		//if (! (fileTypeConverter::controlIfFileExists($fn))){ return fileTypeConverter::FNE;}
		$page--; //adatto il numero della pagina all'array
		$command = 'convert ' . $fn . '[' . $page . '] ' . CONFIG::$imagesPath . $name . '.jpeg';
		try{
			$result = shell_exec($command);
		}catch(Exception $e){
			$result = $e->getMessage();
		}
		return $result;
	}

	//convert just selected pages, thoose written in  array '$pages'
	public static function convertNPages($pages, $fn, $destination, $name){
		//if (! (fileTypeConverter::controlIfFileExists($fn))){ return fileTypeConverter::FNE;}
		$i = 0;
		$j = 0;
		$x = 0;
		$nPages = $this->countPages($fn);
		//suiting the number of pages into indexes of array
		for($j=0; $j<count($pages); $j++){
			$pages[$j]--;
		}
		sort($pages);
		for($i=0; $i<=$nPages; $i++){
			for($j=0; $j<count($pages); $j++){
				if($pages[$j]==$i){
					$command = 'convert ' . $fn . '[' . $i . '] ' . CONFIG::$imagesPath . $name . $x . '.jpeg';
					try{
						shell_exec($command);
					}catch(Exception $e){
						$result = $e->getMessage();
					}
					$x++;
				}
			}
		}
		if($result != null) return $result;
	}


}
?>
