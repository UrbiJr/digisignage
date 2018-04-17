<?php

$action=(isset($_REQUEST['action']) ? $_REQUEST['action'] : 'list');

switch ($action) {
  case 'list':
    $utenti = UtentiTab::getAll();
    $content=get_include_contents(CONFIG::$controllerPath."utente/ViewUtenti.php");
    break;
  case 'new':
    $elenco = AziendeTab::getAll();
    $content = get_include_contents(CONFIG::$controllerPath."utente/ViewAggiungi.php");
    break;
  case 'add':
    $ruolo=RuoliTab::getById($utente->getIdRuolo());
    if($ruolo->getCodice()==30){
      $ruoloAdd=(RuoliTab::getByCode(20))->getid();
    }else {
      $ruoloAdd=(RuoliTab::getByCode(10))->getid();
    }
    $utenteN = new Utente(NULL,$_POST['nome'],$_POST['password'],$_POST['mail'],$_POST['id_a'],$ruoloAdd);
    $utenteN->save();
    $utenti = UtentiTab::getAll();
    $content = get_include_contents(CONFIG::$controllerPath."utente/ViewUtenti.php");
    break;
  case 'delete':
    $utenteN = UtentiTab::getById($_GET["id"]);
    $utenteN->delete();
    $utenti = UtentiTab::getAll();
    $content = get_include_contents(CONFIG::$controllerPath."utente/ViewUtenti.php");
    break;
}

?>
