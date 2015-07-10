<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Karminna</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="congresos, 'congresos argentina', congreso" />
  <meta name="description" content="Congresos en argentina" />
  <link rel="shortcut icon" href="app_images/favicon.ico" />
  <link rel="stylesheet" href="app_css/estilo.css" />
  <link rel="stylesheet" href="nivo-slider/themes/default/default.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="nivo-slider/nivo-slider.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="app_css/tabs.css" type="text/css" media="screen"/>
  <link rel="stylesheet" href="app_css/jquery.jqzoom.css" type="text/css">
  <script type="text/javascript" src="app_js/jquery-1.7.1.min.js"></script>
  <script type="text/javascript" src="app_js/jquery.waitforimages.js"></script>
  <script type="text/javascript" src="app_js/functions_f.js"></script>
  <script type="text/javascript" src="app_js/jquery.loader.min.js"></script>
  <script type="text/javascript" src="nivo-slider/jquery.nivo.slider.pack.js"></script>
  <script type="text/javascript" src="app_js/jquery.jqzoom-core.js"></script>
  <script type="text/javascript" src="app_js/jquery.fancybox.js" charset="utf-8"></script>
</head>
<script type="text/javascript">
$(window).load(function() {
    $('#slider').nivoSlider();
});
</script>
<body>
  <div id ="block"></div>
  <div id="popupbox"></div>
  <div id="wrap">
      <div class="container">
          <div id="dvHeader">
              <h2>KARMINNA</h2>
              <p>ON LINE STORE</p>
          </div>
          <div id="dvMenu">
              <ul>
                <li id="contacto">CONTACTO</li>
                <li class="menu" data-local="13">LOOKBOOK</li>
                <li id="index" class="active">INICIO</li>
              </ul>
          </div>
          <div id="content">
              <div id="dvPrincipal">
                  <?php include_once ($view->contentTemplate); // incluyo el template que corresponda ?>
              </div>
          </div>
      </div>
      <div class="clear"></div>
      <div id="footer">
        <div class="container" id="direccion">
            <p >Av. Colón 3502 local 3, ciudad de Córdoba. TE 0351 487 0111</p>
            <p >Tucumán 481, ciudad de Jesús María. TE  03525 606 403</p>
        </div>
        <div id="copyright">
            <p class="copyright">&copy;&nbsp;All rights reserved - Powered by ncsoftware</p>
        </div>
      </div>

  </div>
</body>
</html>
