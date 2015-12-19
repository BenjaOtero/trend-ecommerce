$(document).ready(function(){
       
    $('#index').on('click',function(){
        $(".div-menu li").each(function (){$(this).removeClass('active');});
        $(this).addClass('active');
        params={};
        params.action='refreshIndex';
        $('#div-contenido').load("index.php", params, function(){
        });
    });    
      
    $('.menu').click(function(){        
       // $('#myPleaseWait').modal('show');
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
            $('#myPleaseWait').modal('hide');            
        });
    });  
    
    $(document).on('click', '#mobile-menu-button', function() {
      var $mobileMenu = $('#mobile-main-menu');	
      $mobileMenu.slideToggle('fast');    
    });
    
    $(document).on('click', '.item', function() {        
      //  $('#myPleaseWait').modal('show');
        var idItem=$(this).attr('data-idItem');
        var genero=$(this).attr('data-genero');
        var titulo=$(this).attr('data-desc');
        params={};
        params.action='byItem';
        params.idItem=idItem;
        params.genero=genero;
        params.titulo=titulo;
        $('#columna-articulos').load("index.php",params,function(){
            $('#myPleaseWait').modal('hide');
        });
    });    
      
    $(document).on('click', '.articulo', function() {                
        var local=$(this).attr('data-loc');
        var articulo=$(this).attr('data-art');
        params={};
        params.action='articulo';
        params.local=local;
        params.articulo=articulo;
        $('#columna-articulos').load("index.php",params,function(){
          $('.jqzoom').jqzoom({
            zoomType: 'standard',
            lens:true,
            preloadImages: false,
            alwaysOn:false
          });
        });
    }); 
    
    $(document).on('click', '.mini', function() {                
        var imagen=$(this).attr('data-mini');
        $('#img-articulo').attr('src',imagen);
    });     
   
       
});