$(document).ready(function(){
       
    $('#index').on('click',function(){
        $(".div-menu li").each(function (){$(this).removeClass('active');});
        $(this).addClass('active');
        params={};
        params.action='refreshIndex';
        $('#div-contenido').load("index.php", params, function(){
        });
    });    
      
    $(document).on('click', '.menu-own', function() {  
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
    
    $(document).on('click', '#li-contacto', function() {  
        $('#fondo-loader').css("display", "block");
        $('.modal-dialog').css("display", "block");
        //preparo los parametros
        params={};
        params.action='contacto';
        $('#contacto').load("index.php",params,function(){
            $('.modal-dialog').css("display", "none");
            document.frmContacto.txtNombre.focus();
        });
    }); 
    
    $(document).on('click', '#enviar', function() {          
    	if (document.frmContacto.txtNombre.value.length===0)
        {
           alert("Tiene que escribir un nombre");
           document.frmContacto.txtNombre.focus();
           return false;
        }
        valor = document.frmContacto.txtMail.value;
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(valor))
            {
            }
        else
        {
        alert("La dirección de email es incorrecta.");
        document.frmContacto.txtMail.focus();
        return false;
        }
    	if (document.frmContacto.txtArea.value.length===0)
        {
           alert("Tiene que escribir un comentario");
           document.frmContacto.txtArea.focus();
           return false;
        }
        $('body').css("cursor", "wait");
        $("#txtNombre").hover(function(){
            $("#txtNombre").css("cursor","wait");
        });
        $("#txtMail").hover(function(){
            $("#txtMail").css("cursor","wait");
        });
        $("#txtArea").hover(function(){
            $("#txtArea").css("cursor","wait");
        });
        $("#txtTe").hover(function(){
            $("#txtTe").css("cursor","wait");
        });        
        var txtNombre = $("#txtNombre" ).val();
        var txtMail = $("#txtMail" ).val();
        var txtArea = $("#txtArea" ).val();
        var txtTe = $("#txtTe" ).val();
        params={};
        params.txtNombre=txtNombre;
        params.txtMail=txtMail;
        params.txtArea=txtArea;
        params.txtTe=txtTe;
        $('#popupmail').load("mail.php",params,function(){
            $('#popupmail').show();
            $('body').css("cursor", "default");
            $("#txtNombre").hover(function(){
                $("#txtNombre").css("cursor","default");
            });
            $("#txtMail").hover(function(){
                $("#txtMail").css("cursor","default");
            });
            $("#txtArea").hover(function(){
                $("#txtArea").css("cursor","default");
            });
            $("#txtTe").hover(function(){
                $("#txtTe").css("cursor","default");
            });             
        });
       // return false;
    });     
    
    $(document).on('click', '#cerrar-dialogo', function() {  
        $("#dialogo").remove();
        $('#fondo-loader').css("display", "none");
    });  
            
    $(document).on('click', '#mobile-menu-button', function() {
      var $mobileMenu = $('#mobile-main-menu');	
      $mobileMenu.slideToggle('fast');    
    });
    
    $(document).on('click', '.items', function() {        
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
            $('.mini').each(function() {
                var imagen=$(this).attr('data-mini');
                $.preload(imagen);
            });              
        });
      
    }); 
    
    $(document).on('click', '#ampliar', function() { 
        var articulo=$('#img-articulo').attr('data-articulo');
        var imagen=$('#img-articulo').attr('src');        
        var params = '?action=maximizarArticulo&imagen=' + imagen + '&articulo=' + articulo; 
        var alto = $( window ).height();
        window.open ('index.php' + params,'','height=' + alto + 'px,width=790px,top=10,left=10,scrollbars=1');
        return false;
    });      
    
    $(document).on('click', '.mini', function() {                
        var imagen=$(this).attr('data-mini');
        var articulo=$(this).attr('data-articulo');
        $('#img-articulo').attr('src',imagen);
        $('#img-articulo').attr('data-articulo',articulo);
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
    
        $(document).on('mouseover', '.mini', function() {             
        var imagen=$(this).attr('data-mini');
        $('#img-articulo').attr('src',imagen);      
    });     
    
    $(document).on('mouseleave', '.mini', function() {             
        var imagen=$(this).attr('data-mini');
        $("#colors label").each(function (){
            if($(this).hasClass("selected-color"))
            {
                var imagen=$(this).children().attr('data-mini');
                $('#img-articulo').attr('src',imagen);  
            }  
        });         
    });  
    
    $(document).on('click', '.color', function() {             
        var imagen=$(this).attr('data-mini');
        var articulo = $(this).attr('data-articulo');
        $('#img-articulo').attr('src',imagen);
        $('#img-articulo').attr('data-articulo',articulo);
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
    
    $(document).on('mouseover', '.color', function() {             
        var imagen=$(this).attr('data-mini');
        $('#img-articulo').attr('src',imagen);      
    });     
    
    $(document).on('mouseleave', '.color', function() {             
        $("#colors label").each(function (){
            if($(this).hasClass("selected-color"))
            {
                var imagen=$(this).children().attr('data-mini');
                $('#img-articulo').attr('src',imagen);  
            }  
        });         
    });     
          
});