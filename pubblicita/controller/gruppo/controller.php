<?php

$action=(isset($_REQUEST['action']) ? $_REQUEST['action'] : 'list');

switch ($action) {
    case 'new':
      $gruppi = GruppiTab::getAll();
      $aziende = AziendeTab::getAll();
    	$content = get_include_contents(CONFIG::$controllerPath."gruppo/ViewAggiungi.php");
    	break;
    case 'add':
	    $gruppo = new gruppo(NULL,$_POST['sigla'],$_POST['descrizione'],$utente->getIdAzienda());
	    $gruppo->save();
  	  $gruppi = GruppiTab::getAll();
  		$aziende = AziendeTab::getAll();
   		$content = get_include_contents(CONFIG::$controllerPath."gruppo/ViewGruppi.php");
   	  break;
    case 'edit':
      $gruppo = GruppiTab::getById($_GET["id"]);
    	$aziende = AziendeTab::getAll();
      $gruppi = GruppiTab::getAll();
    	$content = get_include_contents(CONFIG::$controllerPath."gruppo/ViewModifica.php");
    	break;
	  case 'update':
      $gruppo = new Gruppo ($_POST["id"],$_POST['sigla'],$_POST['descrizione'],$utente->getIdAzienda());
      $gruppo->save();
      $aziende = AziendeTab::getAll();
      $gruppi = GruppiTab::getAll();
      $content = get_include_contents(CONFIG::$controllerPath."gruppo/ViewGruppi.php");
     	break;
    case 'delete':
  		$gruppo = GruppiTab::getById($_GET["id"]);
  		$gruppo->delete();
  		$gruppi = GruppiTab::getAll();
  		$content = get_include_contents(CONFIG::$controllerPath."gruppo/ViewGruppi.php");
    	break;
   	case 'list':
      $gruppi = GruppiTab::getAll();
    	$aziende = AziendeTab::getAll();
    	$content=get_include_contents(CONFIG::$controllerPath."gruppo/ViewGruppi.php");
    	break;

}
?>
