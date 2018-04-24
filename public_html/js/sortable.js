$(document).ready(function(){
    $("#sequenza").sortable({
      cursor : "pointer",
      update: function(event, ui){
        var h = [];
        $("ul.reorder-photos-list li").each(function() {  h.push($(this).attr('id'));  });
        $.ajax({
          type: "POST",
          url: "index.php?model=sequenza&action=sort",
          data: {ids: " " + h + ""},
          dataType: "text",
          success: function(data){
            //alert("data: "+data);
          },
          error: function(obj, text, error){
              //alert(obj.responseText);
          }
        });
      }
    });
    $("#aggiungi_risorse_selezionate").unbind('click').click(function(){
      //var risorse = document.getElementsByClassName("risorsa_item");
      var risorse = document.getElementById("risorse").children;
      var target = document.getElementById("sequenza");
      var checkbox, risorseSelezionate = [];
      //crea elenco di risorse selezionate
      for (var i = 0; i < risorse.length; i++) {
        checkbox = risorse[i].children[0];
        if(checkbox.checked){
          risorseSelezionate.push(risorse[i]);
        }
      }
      //alert(risorseSelezionate.length);
      //aggiungi le risorse selezionate alla sequenza
      for (var x = 0; x < risorseSelezionate.length; x++) {
        //aggiungi con ajax
        var idRisorsa = risorseSelezionate[x].id;
        var nOrdine = (target.children).length+1;

        $.ajax({
          type: "POST",
          url: "index.php?model=sequenza&action=add",
          data: {idRisorsa: idRisorsa, nOrdine: nOrdine},
          dataType: "text",
          success: function(data){
            //alert(data);
            button = risorseSelezionate[x].children[2];
            button.classList.remove("aggiungi_risorsa");
            button.classList.add("rimuovi_risorsa");
            button.innerHTML = "rimuovi";
            //metti l'id della sequenza appena creata nell'attributo id di checked

            //aggiungi la risorsa alla lista in jq
            target.appendChild(risorseSelezionate[x]);
          },
          error: function(){
            alert("errore");
          }
        });
      }
    });
    $(".aggiungi_risorsa").unbind('click').click(function(){
      //elemento a cui appendere la risorsa
      var target = document.getElementById("sequenza");
      //ottiene il bottone che viene premuto
      var button = document.getElementById($(this).attr("id"));
      //ottieni la risorsa da cui proviene il bottone
      var risorsa = button.parentElement;

      var idRisorsa = risorsa.id;
      var nOrdine = (target.children).length+1;
      //alert(nOrdine);
      //aggiungi al database tramite ajax
      $.ajax({
        type: "POST",
	      url: "index.php?model=sequenza&action=add",
      	data : {idRisorsa: idRisorsa, nOrdine: nOrdine},
        dataType: "text",
	      success: function(data){
	        alert(data);
	        //attribuischi alla sequenza appena aggiunta sulla pagina l'id di quella sul database
          //cambia la classe del bottone aggiungi_sequenza in rimuovi_sequenza
          button.classList.remove("aggiungi_risorsa");
          button.classList.add("rimuovi_risorsa");
          button.innerHTML = "rimuovi";
      	  //aggiugni la risorsa alla sequenza
      	  target.appendChild(risorsa);
	      },
	      error: function(){
	        alert("errore");
	      }
      });

    });

    $("#rimuovi_risorse_selezionate").unbind('click').click(function(){
      var risorse = document.getElementsByClassName("risorsa_seq");
      var target = document.getElementById("risorse");
      var checkbox,risorseSelezionate = [];
      var button;
      //crea elenco di risorse selezionate
      for (var i = 0; i < risorse.length; i++) {
        checkbox = risorse[i].children[0];
        if(checkbox.checked){
          risorseSelezionate.push(risorse[i]);
        }
      }
      //aggiungi le risorse selezionate alla sequenza
      for (var i = 0; i < risorseSelezionate.length; i++) {
        //aggiungi con ajax
        var idSequenza = risorseSelezionate[i].id;

        $.ajax({
          type: "POST",
          url: "index.php?model=sequenza&action=delete",
          data: {idSequenza: idSequenza},
          dataType: "text",
          success: function(data){
            button = risorseSelezionate[i].children[2];
            button.classList.remove("rimuovi_risorsa");
            button.classList.add("aggiungi_risorsa");
            button.innerHTML = "aggiungi";
            /*
            //metti l'id della sequenza appena creata nell'attributo id di checked
            checked[i].id = data;
            //aggiungi la risorsa alla lista in jq
            target.appendChild(checked[i]);
            */
            target.appendChild(risorseSelezionate[i]);
            //sistema il numero ordine sul db
            var h = [];
            $("ul.reorder-photos-list li").each(function() {  h.push($(this).attr('id'));  });
            $.ajax({
              type: "POST",
              url: "index.php?model=sequenza&action=sort",
              data: {ids: " " + h + ""},
              dataType: "text"
            });
          },
          error: function(){
            alert("errore");
          }
        });
      }
    });

    $(".risorsa").unbind('click').on("click",".rimuovi_risorsa",function(){
      //alert("ciao");
      var target = document.getElementById("risorse");
      var button = document.getElementById($(this).attr("id"));
      var parent = button.parentElement;

      var idSequenza = parent.id;
      alert(idSequenza);

      $.ajax({
        type: "POST",
        url: "index.php?model=sequenza&action=delete",
        data: {idSequenza: idSequenza},
        dataType: "text",
        success: function(){
          button.innerHTML = "aggiungi";
          button.classList.remove("rimuovi_risorsa");
          button.classList.add("aggiungi_risorsa");
          target.appendChild(parent);
          //sistema il numero ordine sul db
          var h = [];
          $("ul.reorder-photos-list li").each(function() {  h.push($(this).attr('id'));  });
          $.ajax({
            type: "POST",
            url: "index.php?model=sequenza&action=sort",
            data: {ids: " " + h + ""},
            dataType: "text"
          });
        }
      });

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
