$(document).ready(function(){
    $('.reorder_link').on('click',function(){
        $("ul.reorder-photos-list").sortable({ tolerance: 'pointer' });
        $('.reorder_link').html('Salva ordinamento');
        $('.reorder_link').attr("id","save_reorder");
        $('#reorder-helper').slideDown('slow');
        $('.image_link').attr("href","javascript:void(0);");
        $('.image_link').css("cursor","move");
        $("#save_reorder").click(function( e ){
            if( !$("#save_reorder i").length ){
                $(this).html('').prepend('<img src="images/refresh-animated.gif"/>');
                $("ul.reorder-photos-list").sortable('destroy');
                $("#reorder-helper").html( "Reordering Photos - This could take a moment. Please don't navigate away from this page." ).removeClass('light_box').addClass('notice notice_error');
    
                var h = [];
                $("ul.reorder-photos-list li").each(function() {  h.push($(this).attr('id').substr(9));  });
                
                $.ajax({
                    type: "POST",
                    url: "indexSortImg.php?action=sort",
                    data: {ids: " " + h + ""},
			dataType: "text",

		    beforeSend: function() {
			    
			},

			complete: function() {
				alert("777");
			},

			success: function(data){
			   
			    alert(data);
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
