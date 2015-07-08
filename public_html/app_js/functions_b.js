$(document).ready(function(){

 /*-------------------------- Menú backend ------------------------------*/

    $('#inscripciones').live('click',function(){
        $('#content').load("menu.php",{controlador:"inscripciones"});
    })

    $('#pagos').live('click',function(){

    })

    $('#usuarios').live('click',function(){
        $('#content').load("menu.php",{controlador:"usuarios"});
    })

    /*-------------------------fin menu------------------------------*/

    $('#new').live('click',function(){
        var controlador=$(this).attr('name'); // seteado en la variable $pagina en xxxx_grid.tpl
        params={};
        params.controlador=controlador;
        params.action="nuevo";
        $('#popupbox').load("menu.php", params,function(){
            $('#block').show();
            $('#popupbox').show();
       //     $('.primero:first').focus();
        })
    })

    $('#imprimir').live('click',function(){
        var controlador=$(this).attr('name'); // seteado en la variable $pagina en xxxx_grid.tpl
        params={};
        params.controlador=controlador;
        params.action="imprimir";
        $('#content').load("menu.php",params,function(){});
    })

    $('#btnFind').live('click',function(){
        var controlador=$(this).attr('name');
        var params={};
        params.action='refreshGrid';
        params.txtFind=$('#txtFind').val();
        params.pos=0;
        params.origen='btnFind';
        params.controlador=controlador;
        $('#content').load("menu.php",params,function(){});
        return false;
    })

    $('#btnFindInter').live('click',function(){
        var pagina=$(this).attr('name'); // seteado en la variable $pagina en xxxx_grid.tpl
        params={};
        params.action="buscar";
        $('#popupbox').load(pagina, params,function(){
            $('#block').show();
            $('#popupbox').show();
        })
    })

    $('.edit').live('click',function(){
        //this = es el elemento sobre el que se hizo click en este caso el link

        var controlador=$(this).attr('name'); //obtengo el valor que guardamos en el atributo name
        var id=$(this).attr('data-id');  //obtengo el id que guardamos en data-id
        //preparo los parametros
        params={};
        params.controlador=controlador;
        params.id=id;
        params.action="editar";
        $('#popupbox').load("menu.php", params,function(){
            $('#block').show();
            $('#popupbox').show();
        })
    })

    $('.delete').live('click',function(){
        if(confirm("Confirma el borrado de datos?"))
          {
              //obtengo el id que guardamos en data-id
              var controlador=$(this).attr('name');
              var id=$(this).attr('data-id');
              //preparo los parametros
              params={};
              params.id=id;
              params.action="borrar";
              params.controlador=controlador;
              $('#popupbox').load("menu.php", params,function(){
                  $('#content').load("menu.php",{controlador:controlador,action:"refreshGrid",origen:"borrar"});
              })
          }
    })


    $('#cancel').live('click',function(){
        $('#block').hide();
        $('#popupbox').hide();
    })

    $('#submitUsuario').live('click',function(){
    	if (document.frmUsuarios.txtNombre.value.length==0)
    		{
    		   alert("Tiene que escribir un nombre");
    		   document.frmUsuarios.txtNombre.focus();
    		   return false;
    		}
    	if (document.frmUsuarios.txtEmail.value.length==0)
    		{
    		   alert("Tiene que escribir un correo")
    		   document.frmUsuarios.txtEmail.focus()
    		   return false;
    		}
        valor = document.frmUsuarios.txtEmail.value;
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(valor))
        	{
        	}
    	else
        	{
        	    alert("La dirección de email es incorrecta.");
        		document.frmUsuarios.txtEmail.focus();
        		return false;
        	}
    	if (document.frmUsuarios.txtClave.value.length==0)
    		{
    		   alert("Tiene que escribir una clave")
    		   document.frmUsuarios.txtClave.focus()
    		   return false;
    		}
    	if (document.frmUsuarios.txtClave2.value.length==0)
    		{
    		   alert("Debe repetir la clave")
    		   document.frmUsuarios.txtClave2.focus()
    		   return false;
    		}

        var clave1 = document.frmUsuarios.txtClave.value;
        var clave2 = document.frmUsuarios.txtClave2.value;
    	if (clave1!=clave2)
    		{
    		   alert("Las claves no coinciden.")
    		   document.frmUsuarios.txtClave.focus()
    		   return false;
    		}
        var params={};
        params.action='saveUsuario';
        params.id=$('#id').val();
        params.nombre=$('#txtNombre').val();
        params.email=$('#txtEmail').val();
        params.hdnClave=$('#hdnClave').val();
        params.clave=$('#txtClave').val();
        params.nivel=$('#sltNivel').val();
        params.controlador="usuarios";
        $.post("menu.php",params,function(){
            $('#block').hide();
            $('#popupbox').hide();
            $('#content').load("menu.php",{controlador:"usuarios",action:"refreshGrid",origen:"guardar"});
        })
        return false;
    })

    $('.paginar').live('click',function(){
        var controlador=$(this).attr('name');
        var inicio=$(this).attr('data-id');
        var params={};
        params.action='refreshGrid';
        params.controlador=controlador;
        params.pos=inicio;
        params.origen='paginar';
        $('#content').load("menu.php",params,function(){

        })
        return false;
    })

})

function cambiaFila(fila) {
    document.getElementById("fila" + fila).style.backgroundColor='#006666';
    document.getElementById("texto" + fila).style.backgroundColor='#006666';
    document.getElementById("texto" + fila).style.borderColor='#006666';
}

function vuelveFila(fila,miStyle) {
  if(miStyle==3)
    {
     document.getElementById("fila" + fila).style.backgroundColor='black';
     document.getElementById("texto" + fila).style.backgroundColor='black';
     document.getElementById("texto" + fila).style.borderColor='black';
    }
  else
    {
    document.getElementById("fila" + fila).style.backgroundColor='#222222';
    document.getElementById("texto" + fila).style.backgroundColor='#222222';
    document.getElementById("texto" + fila).style.borderColor='#222222';
    }
}
function AbrirUrl(URL){
  window.location=URL;
}
NS={};
