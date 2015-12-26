$(document).ready(function(){
    
    $('.mini').each(function() {
        var imagen=$(this).attr('data-mini');
        $.preload(imagen);
    });  
    
});