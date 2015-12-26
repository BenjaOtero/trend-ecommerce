$(document).ready(function(){
    
    $('.mini').each(function() {
        var imagen="images/" + $(this).attr('data-imagen') + "_large.jpg";
        $.preload(imagen);
    });  
    
    $(document).on('click', '.mini', function() {                
        var imagen=$(this).attr('data-imagen');
        var ruta= "images/" + imagen + "_large.jpg";
        $('#imgMax').attr('src',ruta);          
    });     
    
});