$(document).ready(function(){
	$('#reload-button').css('display', 'none');
	
    $('.reorder_link').on('click',function(){
        $("ul.reorder-photos-list").sortable({ tolerance: 'pointer' });
        $('.reorder_link').html('Salva ordinamento');
        $('.reorder_link').attr("id","save_reorder");
        $('#reorder-helper').slideDown('slow');
        $('.image_link').attr("href","javascript:void(0);");
        $('.image_link').css("cursor","move");
        $("#save_reorder").click(function( e ){
            if( !$("#save_reorder i").length ){
            
                $("ul.reorder-photos-list").sortable('destroy');
        
                var h = [];
                $("ul.reorder-photos-list li").each(function() {  h.push($(this).attr('id').substr(9));  });
                
                $.ajax({
                    type: "POST",
                    url: "indexSortImg.php?action=sort",
                    data: {ids: " " + h + ""},
			dataType: "text",

		    beforeSend: function() {
			$('#save_reorder').html('').prepend('<img height="32px" witdh="32px" src="images/loading.svg"/>');
			    $("#reorder-helper").html( "Riordinando le foto - Potrebbe richiedere un momento. Non lasciare questa pagina." ).removeClass('light_box').addClass('notice notice_error');
    
			},

			complete: function() {
				$('#save_reorder').html('').prepend('<img height="32px" witdh="32px" src="images/completed.png"/>');
				$("#reorder-helper").html('Caricamento completato');
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
});

function reload(){
	window.location.href = "indexSortImg.php?action=start&nocache=" + (new Date()).getTime();	    
}
