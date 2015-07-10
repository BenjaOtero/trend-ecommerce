<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script type="text/javascript" src="../../app_js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="../../app_js/functions.js"></script>
    <link rel="stylesheet" href="../../app_css/abm.css" type="text/css" />
    <link rel="stylesheet" href="../../app_css/master_back.css" type="text/css" />
    <!--[if IE]>
        <link rel="stylesheet" type="text/css" href="../app_css/ie_abm.css" />
    <![endif]-->
</head>
<body>
    <div id ="block"></div>
    <div id="popupbox"></div>
    <center>
      <div id="divContainer">
          <center>
            <div id="dvMenu">
                <input type="button" class='button2' value =" " />
                <input id="btnInicio" type="button" value ="Inicio" class='button' onclick="AbrirUrl('../../index.html')" />
                <input id="btnUsuarios" type="button" value ="Usuarios" class='button' onclick="AbrirUrl('../../secure/usuarios/usuarios.php')" />
                <input id="btnClientes" type="button" value ="Clientes" class='button' onclick="AbrirUrl('../../secure/clientes/clientes.php')" />
                <input id="btnItems" type="button" value ="Items" class='button' onclick="AbrirUrl('../../secure/items/items.php')" />
                <input id="btnProductos" type="button" value ="Productos" class='button' onclick="AbrirUrl('../../secure/productos/productos.php')" />
                <input type="button" class='button2' value =" " />
            </div>
          </center>
          <div id="content">
              <?php include_once ($view->contentTemplate); // incluyo el template que corresponda ?>
          </div>
      </div>
      </center>
</body>
</html>