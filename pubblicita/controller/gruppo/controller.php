<?php

$action=(isset($_REQUEST['action']) ? $_REQUEST['action'] : 'list');

switch ($action) {
    case 'new':
    	$content = get_include_contents(CONFIG::$controllerPath."gruppo/ViewAggiungi.php");
    	break;
    case 'add':
	    $gruppo = new gruppo(NULL,$_POST['sigla'],$_POST['descrizione'],$utente->getIdAzienda());
	    $gruppo->save();
      $azienda = AziendeTab::getById($utente->getIdAzienda());
      $gruppi = GruppiTab::getGruppoByAzienda($azienda);
   		$content = get_include_contents(CONFIG::$controllerPath."gruppo/ViewGruppi.php");
   	  break;
    case 'edit':
      $gruppo = GruppiTab::getById($_GET["id"]);
      $azienda = AziendeTab::getById($utente->getIdAzienda());
      $gruppi = GruppiTab::getGruppoByAzienda($azienda);
    	$content = get_include_contents(CONFIG::$controllerPath."gruppo/ViewModifica.php");
    	break;
	  case 'update':
      $gruppo = new Gruppo ($_POST["id"],$_POST['sigla'],$_POST['descrizione'],$utente->getIdAzienda());
      $gruppo->save();
      $azienda = AziendeTab::getById($utente->getIdAzienda());
      $gruppi = GruppiTab::getGruppoByAzienda($azienda);
      $content = get_include_contents(CONFIG::$controllerPath."gruppo/ViewGruppi.php");
     	break;
    case 'delete':
  		$gruppo = GruppiTab::getById($_GET["id"]);
  		$gruppo->delete();
      $azienda = AziendeTab::getById($utente->getIdAzienda());
      $gruppi = GruppiTab::getGruppoByAzienda($azienda);
  		$content = get_include_contents(CONFIG::$controllerPath."gruppo/ViewGruppi.php");
    	break;
   	case 'list':
      $azienda = AziendeTab::getById($utente->getIdAzienda());
      $gruppi = GruppiTab::getGruppoByAzienda($azienda);
    	$aziende = AziendeTab::getAll();
    	$content=get_include_contents(CONFIG::$controllerPath."gruppo/ViewGruppi.php");
    	break;

}
?>
