$(document).ready(function(){
       
    $('#index').on('click',function(){
        $(".div-menu li").each(function (){$(this).removeClass('active');});
        $(this).addClass('active');
        params={};
        params.action='refreshIndex';
        $('#div-contenido').load("index.php", params, function(){
        });
    });    
      
    $(document).on('click', '.menu', function() {  
        $('#fondo-loader').css("display", "block");
        $('.modal-dialog').css("display", "block");
        $(".div-menu li").each(function (){$(this).removeClass('active');});
        $(this).addClass('active');
        var genero=$(this).attr('data-idGenero');  //obtengo el id que guardamos en data-idGenero
        var item=$(this).attr('data-idItem');  //obtengo el id que guardamos en data-idItem
        //preparo los parametros
        params={};
        params.action='itemsYarticulos';
        params.item=item;
        params.genero=genero;
        $('#div-contenido').load("index.php",params,function(){
            $('#fondo-loader').css("display", "none");
            $('.modal-dialog').css("display", "none");
        });
    });  
    
    $(document).on('click', '#mobile-menu-button', function() {
      var $mobileMenu = $('#mobile-main-menu');	
      $mobileMenu.slideToggle('fast');    
    });
    
    $(document).on('click', '.item', function() {        
        $('#fondo-loader').css("display", "block");
        $('.modal-dialog').css("display", "block");
        var idItem=$(this).attr('data-idItem');
        var genero=$(this).attr('data-genero');
        var titulo=$(this).attr('data-desc');
        params={};
        params.action='byItem';
        params.idItem=idItem;
        params.genero=genero;
        params.titulo=titulo;
        $('#columna-articulos').load("index.php",params,function(){
            $('#fondo-loader').css("display", "none");
            $('.modal-dialog').css("display", "none");
        });
    });    
      
    $(document).on('click', '.articulo', function() {   
        $('#fondo-loader').css("display", "block");
        $('.modal-dialog').css("display", "block");        
        var local=$(this).attr('data-loc');
        var articulo=$(this).attr('data-art');
        params={};
        params.action='articulo';
        params.local=local;
        params.articulo=articulo;
        $('#columna-articulos').load("index.php",params,function(){
            $('#fondo-loader').css("display", "none");
            $('.modal-dialog').css("display", "none");
        });
    }); 
    
    $(document).on('click', '.mini', function() {                
        var imagen=$(this).attr('data-mini');
        var articulo=$(this).attr('data-articulo');
        $('#img-articulo').attr('src',imagen);
        $("#colors label").each(function (){$(this).removeClass();});
        $("#" + articulo + "_label").addClass("selected-color");  
        $("#talles ul").each(function (){
            if(!$(this).hasClass("talle-inactivos"))
            {
                $(this).addClass("talle-inactivos");
            }                            
        }); 
        $("#" + articulo).removeClass("talle-inactivos");             
    });  
    
    $(document).on('click', '.color', function() {             
        var imagen=$(this).attr('data-mini');
        $('#img-articulo').attr('src',imagen);
        $("#colors label").each(function (){$(this).removeClass();});
        $(this).parent().addClass("selected-color");            
        $("#talles ul").each(function (){
            if(!$(this).hasClass("talle-inactivos"))
            {
                $(this).addClass("talle-inactivos");
            }                            
        }); 
        var articulo = $(this).attr('data-articulo');
        $("#" + articulo).removeClass("talle-inactivos");       
    });    
   
       
});