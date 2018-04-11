<script src="js/sortable.js"></script>
<?php $ordinaSequenze = new OrdinaSequenze(); ?>
<div class="container-fluid">
  <h1>Sequenza </h1>
  <div id="reorder-helper" class="light_box">
    1. Sposta le foto per riordinare.<br>2. Clicca 'Salva Riordinamento' quando finito.
  </div>
  <br/>
  <div class="btn-group">
    <button id="btn_riordina" type="button" class="btn btn-primary">Riordina ancora</button>
    <button id="aggiungi_a_sequenza" type="button" class="btn btn-primary">aggiungi</button>
    <button id="btn_salva" type="button" class="btn btn-primary">Salva</button>
    <button id="btn_pubblica" type="button" class="btn btn-primary">Pubblica</button>
    <button id="btn_anteprima" type="button" class="btn btn-primary">Anteprima</button>
  </div>
  <div class="row">
    <div id="ris_container" class="col-5">
      <h4>Risorse utilizzabili</h4>
      <ul id="risorse" class="list-group" >
        <?php
          //Fetch all images from database
          $images=$ordinaSequenze->getRows();
          if(!empty($images)):
            foreach($images as $row):
              $risorsa = RisorseTab::getById($row['id']);
        ?>
        <li id="image_li_<?php echo $row['id']; ?>" class="ui-sortable-handle risorsa">
              <input type="checkbox" class="ris_selector">
                <a href="javascript:void(0);" style="float:none;" class="image_link">
                    <img src="<?php $risorsa->getThumbnail(); ?>" alt="">
                </a>
        </li>
      <?php endforeach;
            endif;?>
      </ul>
    </div>
    <div id="seq_container" class="col-6">
      <h4>Sequenza</h4>
      <ul id="sequenza" class="reorder_ul reorder-photos-list">
      </ul>
    </div>
  </div>
</div>
