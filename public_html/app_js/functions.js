$(document).ready(function(){

    $('#intranet').live('click',function(){
        $('#popupbox').load("../views/templates/login.tpl",function(){
            $('#block').show();
            $('#popupbox').show();
            $('.primero:first').focus(); 
        })
    })

    $('#btnLoguear').live('click',function(){
    	if (document.frmAutenticar.txtUsuario.value.length==0)
    		{
    		   alert("Tiene que escribir un usuario");
    		   document.frmAutenticar.txtUsuario.focus();
    		   return false;
    		}
    	if (document.frmAutenticar.pssContraseña.value.length==0)
    		{
    		   alert("Tiene que escribir una contraseña");
    		   document.frmAutenticar.pssContraseña.focus();
    		   return false;
    		}
        $('#popupbox').hide();
        $('#block').hide();
    })

                        /* Menú backend */

    $('#clientes').live('click',function(){
        $('#content').load("../../controllers/clientes.php",function(){

        })
    })

    $('#productos').live('click',function(){
        $('#content').load("../../controllers/productos.php",function(){

        })
    })

    $('#articulos').live('click',function(){
        $('#content').load("../../controllers/articulos.php",function(){

        })
    })

    $('#usuarios').live('click',function(){
        $('#content').load("../../controllers/usuarios.php",function(){

        })
    })

         //---------------------------------------------------------------//

                         /* Menú frontend */

    $('#index').live('click',function(){
        params={};
        params.action='refreshIndex';
        $('#content').load("index.php",params,function(){

        })
    })

    $('#productosFront').live('click',function(){
        $('#content').load("../controllers/productos_front.php",function(){

        })
    })

        //---------------------------------------------------------------//

    $('#new').live('click',function(){

       // $('#new').css({'position' : 'relative','top' : '10px','left' : '10px'});

        var pagina=$(this).attr('name'); // seteado en la variable $pagina en xxxx_grid.tpl
        params={};
        params.action="nuevo";
        $('#popupbox').load(pagina, params,function(){
            $('#block').show();
            $('#popupbox').show();
            $('.primero:first').focus();
        })
    })

    $('#btnFind').live('click',function(){
        var pagina=$(this).attr('name');
        var params={};
        params.action='refreshGrid';
        params.txtFind=$('#txtFind').val();
        params.pos=0;
        params.origen='btnFind';
        $('#content').load(pagina,params,function(){

        })
        return false;
    })

    $('.edit').live('click',function(){
        //this = es el elemento sobre el que se hizo click en este caso el link

        var pagina=$(this).attr('name'); //obtengo el valor que guardamos en el atributo name
        var id=$(this).attr('data-id');  //obtengo el id que guardamos en data-id
        //preparo los parametros
        params={};
        params.id=id;
        params.action="editar";
        $('#popupbox').load(pagina, params,function(){
            $('#block').show();
            $('#popupbox').show();
        })
    })

    $('.delete').live('click',function(){
        if(confirm("Confirma el borrado de datos?"))
          {
              //obtengo el id que guardamos en data-id
              var pagina=$(this).attr('name');
              var id=$(this).attr('data-id');
              //preparo los parametros
              params={};
              params.id=id;
              params.action="borrar";
              $('#popupbox').load(pagina, params,function(){
                  $('#content').load(pagina,{action:"refreshGrid",origen:"borrar"});
              })
          }

    })

    $('#frmClientes').live('submit',function(){
    	if (document.frmClientes.txtNombre.value.length==0)
    		{
    		   alert("Tiene que escribir un nombre");
    		   document.frmClientes.txtNombre.focus();
    		   return false;
    		}
    	if (document.frmClientes.txtApellido.value.length==0)
    		{
    		   alert("Tiene que escribir un apellido")
    		   document.frmClientes.txtApellido.focus()
    		   return false;
    		}
    	if (document.frmClientes.txtCorreo.value.length==0)
    		{
    		   alert("Tiene que escribir un correo")
    		   document.frmClientes.txtCorreo.focus()
    		   return false;
    		}
        valor = document.frmClientes.txtCorreo.value;
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(valor))
        	{
        	}
    	else
        	{
        	    alert("La dirección de email es incorrecta.");
        		document.frmClientes.txtCorreo.focus();
        		return false;
        	}
    	if (document.frmClientes.txtTelefono.value.length==0)
    		{
    		   alert("Tiene que escribir un teléfono")
    		   document.frmClientes.txtApellido.focus()
    		   return false;
    		}
    	var tel = document.frmClientes.txtTelefono.value;
    	if (isNaN(tel))
    		{
    			alert("Debe ingresar un valor numerico");
    			document.frmClientes.txtTelefono.focus()
    			return false;
    		}
        var params={};
        params.action='saveClient';
        params.id=$('#id').val();
        params.nombre=$('#txtNombre').val();
        params.apellido=$('#txtApellido').val();

        params.correo=$('#txtCorreo').val();
        params.telefono=$('#txtTelefono').val();
        params.direccion=$('#txtDireccion').val();

        params.fecha=$('#txtFecha').val();
        $.post('../../controllers/clientes.php',params,function(){
            $('#block').hide();
            $('#popupbox').hide();
            $('#content').load('../../controllers/clientes.php',{action:"refreshGrid",origen:"guardar"});
        })
        return false;
    })

    $('#frmUsuarios').live('submit',function(){
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
        $.post('../../controllers/usuarios.php',params,function(){
            $('#block').hide();
            $('#popupbox').hide();
            $('#content').load('../../controllers/usuarios.php',{action:"refreshGrid",origen:"guardar"});
        })
        return false;
    })

    $('#cancel').live('click',function(){
        $('#block').hide();
        $('#popupbox').hide();
    })

    $('.paginar').live('click',function(){
        var pagina=$(this).attr('name');
        var inicio=$(this).attr('data-id');
        var params={};
        params.action='refreshGrid';
        params.pos=inicio;
        params.origen='paginar';
        $('#content').load(pagina,params,function(){

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
