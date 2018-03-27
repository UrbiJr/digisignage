<!DOCTYPE html>
<!-- PAGINA DA INTEGRARE SU index.php-->

<?php
//include database class
include ('../pubblicita/config/config.php');
$controller=new Controller();
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="./js/sortable.js"></script>


<div>
    <a href="javascript:void(0);" class="btn outlined mleft_no reorder_link" id="save_reorder">Riordina foto</a>
    <div id="reorder-helper" class="light_box" style="display:none;">1. Sposta le foto per riordinare.<br>2. Clicca 'Salva Riordinamento' quando finito.</div>
    <div class="gallery">
        <ul class="reorder_ul reorder-photos-list">
        <?php 
            //Fetch all images from database
            $images=$controller->getRows();
            if(!empty($images)){
                foreach($images as $row){
        ?>
            <li id="image_li_<?php echo $row['id']; ?>" class="ui-sortable-handle"><a href="javascript:void(0);" style="float:none;" class="image_link"></a></li>
        <?php } } ?>
        </ul>
    </div>
</div>


