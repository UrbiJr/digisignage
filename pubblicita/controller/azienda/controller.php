<?php

$action=(isset($_REQUEST['action']) ? $_REQUEST['action'] : 'list');

switch ($action) {
  case 'list':
    $aziende = AziendeTab::getAll();
    $content=get_include_contents(CONFIG::$controllerPath."azienda/ViewAziende.php");
    break;
  case 'new':
    $aziende = AziendeTab::getAll();
    $content = get_include_contents(CONFIG::$controllerPath."azienda/ViewAggiungi.php");
    break;
  case 'add':
    $azienda = new Azienda(NULL,$_POST['ragione_sociale']);
    $azienda->save();
    $aziende = AziendeTab::getAll();
    $content = get_include_contents(CONFIG::$controllerPath."azienda/ViewAziende.php");
    break;
  case 'delete':
    $azienda = AziendeTab::getById($_GET["id"]);
    $azienda->delete();
    $aziende = AziendeTab::getAll();
    $content = get_include_contents(CONFIG::$controllerPath."azienda/ViewAziende.php");
    break;
}

?>
