<?php
if (!isset($_SESSION['usuario']) && isset($_SESSION['intentos']))
    {
        die('<h2>Ha intentado loquearse en mas de cinco oportunidades.</h2>
                <p>
                    Debe esperar 5 minutos para intentarlo nuevamente.
                </p>
                <hr>');
    }
if (!isset($_SESSION['usuario']))
    {
        die('<h1>Se requiere autorizaci&oacute;n para poder ingresar</h1>
                <p>
                    El servidor no pudo verificar que usted est&aacute; autorizado para acceder al documento solicitado.
                    Los datos de acceso ingresados son incorrectos o su navegador no soporta las credenciales requeridas.
                </p>
                <hr>');
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script type="text/javascript" src="../app_js/jquery-1.7.min.js"></script>
    <script type="text/javascript" src="../app_js/jquery.form.js"></script>
    <script type="text/javascript" src="../app_js/functions_b.js"></script>
    <script type="text/javascript" src="../app_js/calendario.js"></script>
    <link rel="stylesheet" href="../app_css/abm.css" type="text/css" />
    <link rel="stylesheet" href="../app_css/calendario.css" type="text/css" media="screen">
    <!--[if IE]>
        <link rel="stylesheet" type="text/css" href="../app_css/ie_abm.css" />
    <![endif]-->
</head>
<body>
    <div id ="block"></div>
    <div id="popupbox"></div>
    <div id="popupBuscar"></div>
    <center>
      <div id="divContainer">
          <center>
            <div id="dvMenu">
                <input type="button" class='button2' value =" " />
                <input id="btnInicio" type="button" value ="Inicio" class='button' onclick="AbrirUrl('../')" />
                <input id="inscripciones" type="button" value ="Inscripciones" class='button' />
                <input id="pagos" type="button" value ="Pagos" class='button' />
                <input id="usuarios" type="button" value ="Usuarios" class='button' />
                <input id="clubes" type="button" value ="" class='button' />
                <input id="divisiones" type="button" value ="" class='button' />
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