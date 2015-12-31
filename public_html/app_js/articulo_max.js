$(document).ready(function(){
    
    $('.mini').each(function() {
        var imagen="images/" + $(this).attr('data-imagen') + "_large.jpg";
        $.preload(imagen);
    });  
    
    $(document).on('click', '.mini', function() {                
        var imagen=$(this).attr('data-imagen');
        var ruta=$(this).children().attr('src');
	var n = ruta.search("bck");
        if(n!==-1){
            var ruta= "images/" + imagen + "_bck_large.jpg";
        }
        else{
            var ruta= "images/" + imagen + "_large.jpg";
        }        
        $('#imgMax').attr('src',ruta);          
    });     
    
});