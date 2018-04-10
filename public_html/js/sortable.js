$(document).ready(function(){

    $('.reorder_link').on('click',function(){
        $("#sequenza").sortable({ tolerance: 'pointer' });
        $('.reorder_link').html('Salva ordinamento');
        $('.reorder_link').attr("id","save_reorder");
        $('#reorder-helper').slideDown('slow');
        $('.image_link').attr("href","javascript:void(0);");
        $('.image_link').css("cursor","move");
        $("#btn_salva").click(function( e ){
            if( !$("#save_reorder i").length ){

                $("ul.reorder-photos-list").sortable('destroy');

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
						$("#reorder-helper").html('<img height="24px" witdh="24px" src="images/completed.png"/> Caricamento completato, nuovo ordine:');
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
    });

    $("#btn_riordina").click(function(){
        window.location.href = "index.php?model=sequenza&action=start&nocache=" + (new Date()).getTime();
    });
});
