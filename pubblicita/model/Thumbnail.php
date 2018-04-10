<?php

class Thumbnail{
	
	function __construct($imageToThumb){
		$this->initializeThumb($imageToThumb);
	}
	
	function initializeThumb($image){
		@$info_img = explode(".", $image);
		$file_name = basename($image);
		switch($info_img[2]){
			//Se il formato dell'immagine è png
			case 'png':
			$img = imagecreatefrompng($image);
			$tmb=$this->creaThumbnail($img);
			break;
			//Se il formato dell'immagine è jpeg
			case 'jpeg':
			case 'jpg':
			$img = imagecreatefromjpeg($image);
			$tmb=$this->creaThumbnail($img);
			break;
			default: echo("File inesistente o formato non consentito. Ricorda che l'immagine può essere png, jpeg o jpg");
		}
	}

	//Metodo che crea una Thumbnail da un'immagine e la ritorna
	public static function creaThumbnail($imagePath, $idAzienda, $nomeRisorsa){
		$maxWidth = 200;
		$maxHeight = 150;
		
		$im = new Imagick();
		$im->readImage($imagePath);
		$im->setImageFormat("png24");
		$geo=$im->getImageGeometry();
		//print_r($geo);
		$width=$geo['width'];
		$height=$geo['height'];
		if($width > $height)
		{
			$scale = ($width > $maxWidth) ? $maxWidth/$width : 1;
		}
		else
		{
			$scale = ($height > $maxHeight) ? $maxHeight/$height : 1;
		}
		$newWidth = $scale*$width;
		$newHeight = $scale*$height;
		$im->setImageCompressionQuality(85);
		$im->resizeImage($newWidth,$newHeight,Imagick::FILTER_LANCZOS,1.1);
		$im->writeImages("./images/azienda-".$idAzienda."/".$nomeRisorsa."/"."thumbnail.jpeg", false); 
	}
}
?>
