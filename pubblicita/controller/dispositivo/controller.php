<?php

$action=(isset($_REQUEST['action']) ? $_REQUEST['action'] : 'list');

switch ($action) {
    case 'new':
		$gruppi = GruppiTab::getAll();
      	$content = get_include_contents(CONFIG::$controllerPath."dispositivo/ViewAggiungi.php");
      	break;
    case 'add':
 	    $dispositivo = new Dispositivo(NULL,$_POST['indirizzoMac'],$_POST['indirizzoIp'],$_POST['nome'],$_POST['orientamento'],$_POST['idGruppo']);
		$dispositivo->save();
	  	$gruppi = GruppiTab::getAll();
    	$dispositivi = DispositiviTab::getAll();
     	$content = get_include_contents(CONFIG::$controllerPath."dispositivo/ViewDispositivi.php");
     	break;
    case 'edit':
        $dispositivo = DispositiviTab::getById($_GET["id"]);
      	$dispositivi = DispositiviTab::getAll();
        $gruppi = GruppiTab::getAll();
      	$content = get_include_contents(CONFIG::$controllerPath."dispositivo/ViewModifica.php");
      	break;
	case 'update':
       	$dispositivo = new Dispositivo ($_POST["id"],$_POST['indirizzoMac'],$_POST['indirizzoIp'],$_POST['nome'],$_POST['orientamento'],$_POST['idGruppo']);
	    $dispositivo->save();
	    $dispositivi = DispositiviTab::getAll();
        $gruppi = GruppiTab::getAll();
	    $content = get_include_contents(CONFIG::$controllerPath."dispositivo/ViewDispositivi.php");
       	break;
    case 'delete':
		$dispositivo = DispositiviTab::getById($_GET["id"]);
		$dispositivo->delete();
		$dispositivi = DispositiviTab::getAll();
		$content = get_include_contents(CONFIG::$controllerPath."dispositivo/ViewDispositivi.php");
      	break;
    case 'list':
		$gruppi = GruppiTab::getAll();
      	$dispositivi = DispositiviTab::getAll();
      	$content=get_include_contents(CONFIG::$controllerPath."dispositivo/ViewDispositivi.php");
      	break;
    /* Richiesta da parte del Dispositivo
    del file .zip contenente sequenza immagini */
    case 'download':
        $dispositivi = DispositiviTab::getAll();
        $indirizzoMac = $_GET['macaddress'];
        $dispositivo = DispositiviTab::getByIndirizzoMac($indirizzoMac);
        
        break;

    /* Apertura canale streaming su cui strasmettere
    il file .mp4 (gia' creato) */
    case 'openStream':

        break;

    default:
        echo "ok";
        break;
}
?>
