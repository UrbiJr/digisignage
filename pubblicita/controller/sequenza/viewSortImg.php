<!DOCTYPE html>

<?php
$ordinaSequenze=new OrdinaSequenze();
?>
<script src="./js/sortable.js"></script>


<div>
    <a href="javascript:void(0);" class="btn outlined mleft_no reorder_link" id="save_reorder">Riordina foto</a>
    <div id="reorder-helper" class="light_box" style="display:none;">1. Sposta le foto per riordinare.<br>2. Clicca 'Salva Riordinamento' quando finito.</div>
    <br/>
    <div class="gallery">
        <ul class="reorder_ul reorder-photos-list">
        <?php
            //Fetch all images from database
            $images=$ordinaSequenze->getRows();
            if(!empty($images)){
                foreach($images as $row){
        ?>
            <li id="image_li_<?php echo $row['id']; ?>" class="ui-sortable-handle">
                <a href="javascript:void(0);" style="float:none;" class="image_link">
                    [foto risorsa]
                </a>
            </li>
        <?php } } ?>
        </ul>
    </div>
    <br />
	<button id="reload-button" type="button" onclick="reload()">Riordina ancora</button>
</div>
