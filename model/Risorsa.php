<?php

class Risorsa{
	private $id;
	private $nome;
	private $idAzienda;
	
	private $CONVERT_COMMAND_WORD_TO_PDF = "soffice --headless --convert-to pdf";	
	private $CONVERT_COMMAND_PDF_TO_WORD = "soffice --headless --convert-to odt";

	function __construct($id, $nome, $idAzienda){
		$this->id=$id;
		$this->nome=$nome;
		$this->idAzienda=$idAzienda;
		$this->controllaTipoRisorsa();
	}

	public function setId($id){
		$this->id=$id;
	}
	public function getId(){
		return $this->id;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}
	
	public function getIdAzienda(){
		return $this->idAzienda;
	}

	public function setIdAzienda($idAzienda){
		$this->nome = $idAzienda;
	}


	public function save(){
		if(!$this->id){
			$n=RisorseTab::insert($this);
			$this->setId($n);
			return true;
		}else{
			RisorseTab::update($this);
			return true;
		}
		return false;
	}

	public function delete(){
		RisorseTab::remove($this);
	}
	
	public function getFile(){
		return RisorseTab::getFile($this);
	}

	function controllaTipoRisorsa(){
		$info = explode(".", $this->nome);
		switch($info[1]){
			case 'pdf':
				echo ($this->convert($this->nome,"./images/",$info[0]));
				break;
			case 'docx':
			case 'odt':
				$this->WordTopPdfConvert($this->nome);
				echo ($this->convert($info[0].".pdf","./images/",$info[0]));
				break;
		}
	}


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
		
		//convert all pages into .jpg format
		public function convert($fn, $destination, $name) {
			//if (! (fileTypeConverter::controlIfFileExists($fn))){ return fileTypeConverter::FNE;}
			try{
				$imagick = new Imagick();
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
		
		public function saveToDatabase(){
			$info = explode(".", $this->nome);
			$n=$this->countPages($info[0].".pdf");
			if($n==1){
				$name=$info[0].".jpeg";	
				$file=new File(null,$name,null, './images/' . $name,$this->id);
				$file->save();
			}else{
				for($i=0;$i<$n;$i++){
					$name=$info[0]."-".$i.".jpeg";
					$file=new File(null,$name,null, './images/' . $name,$this->id);
					$file->save();
				}
			}
		}
}
