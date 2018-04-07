<?php
class CreateFiles{
	//file existing control
	public static function controlIfFileExists($fn){return file_exists($fn)?true:false;}

	//convert from word to pdf
	public static function WordToPdfConvert($fn){
		//if (! ( fileTypeConverter::controlIfFileExists($fn))){ return fileTypeConverter::FNE;}
		try{
			/* NON ESEGUE (quindi non crea .pdf), SERVONO PERMESSI!! */
			$result = shell_exec(("export HOME=/tmp && soffice --headless --convert-to pdf"." ".$fn));
			echo $result;

		}catch(Exception $e){
			$result = $e->getMessage();
		}
		return $result;
	}

	//convert all pages into .jpg format
	public static function convert($fn, $destination, $name) {
		//if (! (fileTypeConverter::controlIfFileExists($fn))){ return fileTypeConverter::FNE;}
		try{
			$imagick = new Imagick();
			// maggiore qualita' immagine
			$imagick->setResolution(150, 150);
			// aggiusta immagine
			//$imagick = $imagick->flattenImages();
			$imagick->readImage($fn);
			$imagick->writeImages($destination . $name . ".jpeg", false);
			$result = true;
		}catch(Exception $e){
			$result = $e->getMessage();
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
