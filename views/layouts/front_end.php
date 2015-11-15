<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>KARMINNA</title>
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=yes;">	
        <meta name=”MobileOptimized” content=”width”/>
        <meta name=”HandheldFriendly” content=”true”/>        
	<link rel="stylesheet" href="app_css/flexslider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="app_css/demo.css" type="text/css" media="screen" />   
        <link rel="stylesheet" href="app_css/jquery.jqzoom.css" type="text/css">        
	<script type="text/javascript" src="app_js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="app_js/functions_f.js"></script>        
	<script type="text/javascript" src="app_js/jquery.flexslider.js"></script>      
        <script type="text/javascript" src="app_js/jquery.waitforimages.js"></script>
        <script type="text/javascript" src="app_js/jquery.loader.min.js"></script>
        <script type="text/javascript" src="app_js/jquery.jqzoom-core.js"></script>
        <script type="text/javascript" src="app_js/jquery.fancybox.js" charset="utf-8"></script>        
        
	<!-- Hook up the FlexSlider -->
	<script type="text/javascript">
		$(window).load(function() {
			$('.flexslider').flexslider();
		});
	</script>
</head>
<body>
<div id="container">
    <div id="dvHeader">
        <h2>KARMINNA</h2>
        <p>ON LINE STORE</p>
    </div>   
    <div id="dvMenu">
        <?php include_once ($view->generosTemplate); // incluyo el template que corresponda ?>	
    </div>    
    <div id="dvContenido">	      
	<?php include_once ($view->contentTemplate); // incluyo el template que corresponda ?>		
    </div>
      <div id="footer">
        <div id="dvContenidoFooter">	   
          <div id="direccion">
              <p >Av. Colón 3502 local 3, ciudad de Córdoba. TE 0351 487 0111</p>
              <p >Tucumán 481, ciudad de Jesús María. TE  03525 606 403</p>
          </div>
          <div id="copyright">
              <p class="copyright">&copy;&nbsp;All rights reserved - Powered by ncsoftware</p>
          </div>
        </div>    
      </div>    
</div>
</body>
</html>
