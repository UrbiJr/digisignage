<?php

$dispositivi = DispositiviTab::getAll();

switch ($action) {

    /* Richiesta da parte del Dispositivo
    del file .zip contenente sequenza immagini */
    case 'download':
        $indirizzoMac = $_GET['macaddress'];
        $dispositivo = DispositiviTab::getByIndirizzoMac($indirizzoMac);
        
        break;

    /* Apertura canale streaming su cui strasmettere
    il file .mp4 (gia' creato) */
    case 'openStream':

        break;

    default:

        break;
}
?>
