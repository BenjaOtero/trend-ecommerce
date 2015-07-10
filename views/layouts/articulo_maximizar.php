<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Karminna</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="congresos, 'congresos argentina', congreso" />
  <meta name="description" content="Congresos en argentina" />
  <link rel="shortcut icon" href="app_images/favicon.ico" />
  <link rel="stylesheet" href="app_css/estilo_maximizar.css" />
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
  <div id="wrap">
      <div class="container">
          <div id="content">
              <div id="dvPrincipal">
                  <?php include_once ($view->contentTemplate); // incluyo el template que corresponda 
                  ?>
              </div>
          </div>
      </div>
  </div>
</body>
</html>
