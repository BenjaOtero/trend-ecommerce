$(document).ready(function(){

                         /* Menú frontend */

    $('#index').live('click',function(){
        $.loader({className:"blue-with-image-2",content:''});
        $("#dvMenu li").each(function (){$(this).removeClass('active');});
        $(this).addClass('active');
        params={};
        params.action='refreshIndex';
        $('#dvPrincipal').load("index.php", params, function(){
            $('#slider').nivoSlider();
            $.loader('close');
        });
    });

    $('.menu').live('click',function(){
        $.loader({className:"blue-with-image-2",content:''});
        $("#dvMenu li").each(function (){$(this).removeClass('active');});
        $(this).addClass('active');
    //    var local=$(this).attr('data-local');  //obtengo el id que guardamos en data-id
        //preparo los parametros
        params={};
        params.action='catalogo';
        params.actionCatalogo='loNuevo';
   //     params.local=local;
        $('#dvPrincipal').load("index.php",params,function(responseTxt,statusTxt,xhr){
            $(document).waitForImages(function() {
               $('.columnas').equalCols();
               $.loader('close');
            });
        });
     
    })

    $('.catalogo').live('click',function(){
        $.loader({className:"blue-with-image-2",content:''});
        var idItem=$(this).attr('data-idItem');
      //  var local=$(this).attr('data-local');
        var titulo=$(this).attr('data-desc');
        params={};
        params.action='catalogo';
        if(idItem==0)
        {
            params.actionCatalogo='loNuevoRefresh';
        }
        else
        {
            params.actionCatalogo='byItem';
        }
        params.idItem=idItem;
    //    params.local=local;
        params.titulo=titulo;
        $('#articulos').load("index.php",params,function(){
            $(document).waitForImages(function() {
               $('.columnas').equalCols();
               $.loader('close');
            });
        });
    })

    $('.articulo').live('click',function(){
        $.loader({className:"blue-with-image-2",content:''});
        var local=$(this).attr('data-loc');
        var articulo=$(this).attr('data-art');
        params={};
        params.action='catalogo';
        params.actionCatalogo='articulo';
        params.local=local;
        params.articulo=articulo;
        $('#articulos').load("index.php",params,function(){
          $('.jqzoom').jqzoom({
            zoomType: 'standard',
            lens:true,
            preloadImages: false,
            alwaysOn:false
          });
          $('#articulos').removeAttr('style');
        //  $('.columnas').equalCols();
            $(document).waitForImages(function() {
               $('.columnas').equalCols();
               $.loader('close');
            });
        });
    });
    
    $('#ampliar').live('click',function(){
      //  var local=$(this).attr('data-loc');
        var imagen=$(this).attr('data-imagen');
        var params = '?action=maximizarArticulo&actionCatalogo=maximizarArticulo&imagen=' + imagen; 
        var alto = $( window ).height();
        window.open ('index.php' + params,'','height=' + alto + 'px,width=790px,top=10,left=10,scrollbars=1');
        return false;
    });   
    
    $('.tumbhMax').live('click',function(){
        var imagen;
    /*   var isFound = $(this).attr('data-imagen');
        if(isFound.contains("front"))
        {
            imagen= 'images/' + $(this).attr('data-imagen') + '_medium.jpg';
        }
        else
        {
            imagen= 'images/' + $(this).attr('data-imagen') + '_medium.jpg';
        }*/
        
        imagen= 'images/' + $(this).attr('data-imagen') + '_medium.jpg';
        $('#imgMax').attr('src',imagen);
    });      

    $('#btnCerrar').live('click',function(){
        $('#block').hide();
        $('#popupbox').hide();
    })    

    $('.color').live('click',function(){
        $("#colors label").each(function (){$(this).removeClass();})
        $(this).parent().addClass("selected-color");
        
      /*  $("#talles ul").each(function (){
            if(!$(this).hasClass("talle-inactivos"))
            {
                $(this).addClass("talle-inactivos");
            }                            
        });*/
     /*   var articulo = $(this).attr('data-articulo');
        $("#" + articulo).removeClass("talle-inactivos");   */      
    })

    $('.talle').live('click',function(){
     /* $("#talles label").each(function (){$(this).removeClass();})
      $(this).parent().addClass("selected"); ;*/
    })
    
    $('#contacto').live('click',function(){
      $.loader({className:"blue-with-image-2",content:''});
      $("#dvMenu li").each(function (){$(this).removeClass('active');})
      $(this).addClass('active');
        params={};
        params.action='refreshContacto';
        $('#dvPrincipal').load("index.php",params,function(){
            $.loader('close');
      })
    })    
    
    $('#enviar').live('click',function(){
    	if (document.frmContacto.txtNombre.value.length==0)
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
            document.frmContacto.txtMail.focus()
            return false;
            }
    	if (document.frmContacto.txtArea.value.length==0)
    		{
    		   alert("Tiene que escribir un comentario");
    		   document.frmContacto.txtArea.focus();
    		   return false;
    		}

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
            $('#blockmail').show();
        })
       // return false;
    })    
    
    /*---------------------------------------------------------------------------------------------------------*/

    $.fn.equalCols = function(){
      var tallestHeight = 0;
      $(this).each(function(){
      var thisHeight = $(this).height();
      if (thisHeight > tallestHeight){
          tallestHeight = thisHeight;
      }
      });
      $(this).height(tallestHeight);

    };
        
});


