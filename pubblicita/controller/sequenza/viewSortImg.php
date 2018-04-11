<script type="text/javascript">
  $(document).ready(function(){
    $("#anteprima").hide();
    $("#aggiungi_a_sequenza").click(function(){
      var risorse = document.getElementsByClassName("risorsa");
      var target = document.getElementById("sequenza");
      var checkbox,checked = [];
      //crea elenco di risorse selezionate
      for (var i = 0; i < risorse.length; i++) {
        checkbox = risorse[i].children[0];
        if(checkbox.checked){
          checked.push(risorse[i]);
        }
      }
      var rm,
  	  lastId = parseInt(getLastIdBtnRemove());
      //aggiungi le risorse selezionate alla sequenza
      for (var i = 0; i < checked.length; i++) {
      	//crea il bottone per rimuovere la risorsa dalla sequenza
      	rm = document.createElement("BUTTON");
      	rm.classList.add("btn");
      	rm.classList.add("btn-sm");
      	rm.classList.add("btn-default");
      	rm.classList.add("rimuovi_risorsa");
      	rm.id = (lastId+1);
      	lastId = parseInt(rm.id);
      	rm.appendChild(document.createTextNode("rimuovi"));
        //rimuovi la checkbox
        checked[i].removeChild(checked[i].children[0]);
	      checked[i].appendChild(rm);
        //aggiungi la risorsa alla lista in jq
        target.appendChild(checked[i]);
        //aggiungi con ajax

      }
    });
    $(".risorsa").on("click",".rimuovi_risorsa",function(){
      //alert("ciao");
      var target = document.getElementById("risorse");
      var button = document.getElementById($(this).attr("id"));
      var parent = button.parentElement;

      var checkbox = document.createElement("INPUT");
      checkbox.type = "checkbox";
      checkbox.classList.add("ris_selector");

      parent.removeChild(parent.children[1]);
      parent.insertBefore(checkbox,parent.children[0]);
      target.appendChild(parent);
    });

    $("#btn_pubblica").click(function(){

    });
    $("#btn_anteprima").click(function(){
      //fai comparire la schermata di anteprima

    });
  });
  function getLastIdBtnRemove(){
    var buttons = document.getElementsByClassName("rimuovi_risorsa");
    if(buttons.length > 0){
      var id;
      for(var i = 0; i < buttons.length; i ++){
	id = buttons[i].id;
      }
      return id;
    }else{
      return 0;
    }
  }
</script>
<style media="screen">
/*
  #sequenza{
    height: 300px;
  }
  #risorse{
    height: 300px;
  }
  */
</style>
<?php $ordinaSequenze = new OrdinaSequenze(); ?>
<div class="container-fluid">
  <h1>Sequenza </h1>
  <div class="btn-group">
    <button id="btn_riordina" type="button" class="btn btn-primary">Riordina ancora</button>
    <button id="aggiungi_a_sequenza" type="button" class="btn btn-primary">aggiungi</button>
    <button id="btn_salva" type="button" class="btn btn-primary">Salva</button>
    <button id="btn_pubblica" type="button" class="btn btn-primary">Pubblica</button>
    <button id="btn_anteprima" type="button" class="btn btn-primary">Anteprima</button>
  </div>
  <div class="row">
    <div id="ris_container" class="col-2">
      <h4>Risorse utilizzabili</h4>
      <ul id="risorse" class="list-group" >
        <?php
          //Fetch all images from database
          $images=$ordinaSequenze->getRows();
          if(!empty($images)):
            foreach($images as $row):
        ?>
        <li id="image_li_<?php echo $row['id']; ?>" class="ui-sortable-handle risorsa">
            <input type="checkbox" class="ris_selector">
            <a href="javascript:void(0);" style="float:none;" class="image_link">
                [foto risorsa]
            </a>
        </li>
      <?php endforeach;
            endif;?>
      </ul>
    </div>
    <div id="seq_container" class="col-10">
      <h4>Sequenza</h4>
      <ul id="sequenza">

      </ul>
    </div>
  </div>
</div>
