<script src="js/sortable.js"></script>
<?php $ordinaSequenze = new OrdinaSequenze(); ?>
<div class="container-fluid">
  <h1>Sequenza del gruppo</h1>
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
      <ul id="risorse" class="list-group">
        <?php if(!empty($risorse)): ?>
          <?php foreach($risorse as $risorsa): ?>
            <li id="<?php echo $risorsa->getId(); ?>" class="risorsa">
              <input type="checkbox" class="ris_selector">
              <a href="javascript:void(0)" style="float:none" class="image_link">
                <img src="<?php echo $risorsa->getThumbnail(); ?>" alt="[miniatura non disponibile]">
              </a>
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
                  <a href="javascript:void(0);" style="float:none;" id="<?php echo $row['idRisorsa']; ?>" class="image_link">
                    <img src="<?php echo $risorsa->getThumbnail(); ?>" alt="">
                  </a>
                  <button id="<?php echo $index ?>" type="button" class="btn btn-sm btn-default rimuovi_risorsa">rimuovi</button>
          </li>
        <?php endforeach;
            endif;?>
      </ul>
    </div>
  </div>
</div>
