$(document).ready(function(){
       
    $('#index').on('click',function(){
        $(".div-menu li").each(function (){$(this).removeClass('active');});
        $(this).addClass('active');
        params={};
        params.action='refreshIndex';
        $('#div-contenido').load("index.php", params, function(){
        });
    });    
      
    $('.menu').on('click',function(){        
      //  $('#myPleaseWait').modal('show');
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
    
    $('div#div-items').delegate('.item', 'click', function() {
        alert("");
      });
   
       
});