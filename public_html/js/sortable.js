$(document).ready(function(){

        $("#sequenza").sortable({ tolerance: 'pointer' });
        $('.image_link').attr("href","javascript:void(0);");
        $('.image_link').css("cursor","move");

        $("#btn_salva").click(function( e ){
            if( !$("#save_reorder i").length ){

                $("#sequenza").sortable('disable');

                var h = [];
                $("ul.reorder-photos-list li").each(function() {  h.push($(this).attr('id').substr(9));  });

                $.ajax({
                    type: "POST",
                    url: "index.php?model=sequenza&action=sort",
                    data: {ids: " " + h + ""},
					          dataType: "text",

        				    beforeSend: function() {
          						$('#save_reorder').css('display', 'none');
          					    $("#reorder-helper").html( '<img height="24px" witdh="24px" src="images/loading.svg"/> Riordinando le foto - Potrebbe richiedere un momento. Non lasciare questa pagina.').removeClass("light_box").addClass("notice notice_error");
          					},

          					complete: function() {
          						$("#reorder-helper").html('<img height="24px" witdh="24px" src="images/completed.png"/> Caricamento completato.');
          					},

          					success: function(data){
          						$('#reload-button').css('display', 'block');
          					},

          					error: function(obj, text, error) {
          					    alert(obj.responseText);
          					}
				        });
		            return false;
			      }
            e.preventDefault();
        });

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
        var idRisorsa = checked[i].id;
        var nOrdine = (target.children).length;

        $.ajax({
          type: "POST",
          url: "index.php?model=sequenza&action=add",
          data: {idRisorsa: idRisorsa, nOrdine: nOrdine},
          dataType: "text",
          success: function(data){/*
            //metti l'id della sequenza appena creata nell'attributo id di checked
            checked[i].id = data;
            //aggiungi la risorsa alla lista in jq
            target.appendChild(checked[i]);
          */},
          error: function(){
            alert("errore");
          }
        });
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
/*
      var ris = (parent.id).split("_");
      var idRisorsa = ris[ris.length-1];

      $.ajax({
        type: "GET",
        url: "index.php?model=sequenza&action=delete",
        data: {idRisorsa: idRisorsa},
        dataType: "text"
      });
      */
    });

    $("#btn_riordina").click(function(){
        //window.location.href = "index.php?model=sequenza&action=start&nocache=" + (new Date()).getTime();
        $("#sequenza").sortable('enable');
        $("#reorder-helper").html("1. Sposta le foto per riordinare.<br>2. Clicca 'Salva Riordinamento' quando finito.");
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
