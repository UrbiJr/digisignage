<script src="js/sortable.js"></script>
<?php $ordinaSequenze = new OrdinaSequenze(); ?>
<div class="container-fluid">
  <h1>Sequenza del gruppo</h1>
  <div id="reorder-helper" class="light_box">
    1. Sposta le foto per riordinare.<br>2. Clicca 'Salva Riordinamento' quando finito.
  </div>
  <br/>
  <div class="btn-group">
    <button id="aggiungi_risorse_selezionate" type="button" class="btn btn-primary">aggiungi selezionati</button>
    <button id="rimuovi_risorse_selezionate" type="button" class="btn btn-primary">rimuovi selezionati</button>
    <button id="btn_pubblica" type="button" class="btn btn-primary">Pubblica</button>
    <button id="btn_anteprima" type="button" class="btn btn-primary">Anteprima</button>
  </div>
  <div class="row">
    <div id="ris_container" class="col-5">
      <h4>Risorse utilizzabili</h4>
      <ul id="risorse" class="list-group">
        <?php if(!empty($risorse)): ?>
          <?php foreach($risorse as $index=>$risorsa): ?>
            <li id="<?php echo $risorsa->getId(); ?>" class="risorsa_item">
              <input type="checkbox" class="ris_selector" style="float:left">
              <div style="float:none" class="image_link">
                <h6><?php echo $risorsa->getNome(); ?></h6>
                <img src="<?php echo $risorsa->getThumbnail(); ?>" alt="[miniatura non disponibile]">
              </div>
	      <button id="add_<?php echo $index; ?>" type="button" class="btn btn-sm btn-default aggiungi_risorsa">aggiugni</button>
            </li>
          <?php endforeach; ?>
        <?php endif; ?>
      </ul>
    </div>
    <div id="seq_container" class="col-6">
      <h4>Sequenza</h4>
      <ul id="sequenza" class="reorder_ul reorder-photos-list">
        <?php
          //Fetch all images from database
          $images=$ordinaSequenze->getRows();
          if(!empty($images)):
            foreach($images as $index=>$row):
              //var_dump($row['idRisorsa']);
              $risorsa = RisorseTab::getById($row['idRisorsa']);
              //var_dump($risorsa->getThumbnail());
        ?>
          <li id="<?php echo $row['id']; ?>" class="risorsa">
                  <input type="checkbox" class="ris_selector" style="float:left">
                  <div href="javascript:void(0);" style="float:none;" id="<?php echo $row['idRisorsa']; ?>" class="image_link">
                    <h6><?php echo $risorsa->getNome(); ?></h6>
                    <img src="<?php echo $risorsa->getThumbnail(); ?>" alt="">
                  </div>
                  <button id="rm_<?php echo $index; ?>" type="button" class="btn btn-sm btn-default rimuovi_risorsa">rimuovi</button>
          </li>
        <?php endforeach;
            endif;?>
      </ul>
    </div>
  </div>
</div>
