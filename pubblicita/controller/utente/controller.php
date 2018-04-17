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
    $utenteN = new Utente(NULL,$_POST['nome'],$_POST['password'],$_POST['mail'],$_POST['id_a'],(RuoliTab::getByCode($_POST['ruolo']))->getid());
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
