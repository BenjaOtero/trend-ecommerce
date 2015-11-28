<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>KARMINNA</title>

    <!-- Bootstrap -->
    <link href="./bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<link rel="stylesheet" href="app_css/flexslider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="app_css/style.css" type="text/css" media="screen" />    
    <!--[if IEMobile]> 
      <link rel="stylesheet" href="app_css/styleIE.css" type="text/css" media="screen" /> 
    <![endif]-->       
	<script type="text/javascript" src="app_js/jquery.flexslider.js"></script>
	<!-- Hook up the FlexSlider -->
	<script type="text/javascript">
		$(window).load(function() {
			$('.flexslider').flexslider();
		});
	</script>    
  </head>
  <body>
    <header id="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-10 col-md-offset-1" id="div-header">
                    <h1 id="main-logo">KARMINNA<span>ON LINE STORE</span></h1>
                </div>        
            </div>
            <?php include_once ($view->generosTemplate); // incluyo el template que corresponda ?>	      
        </div>
    </header>
    <div id="principal">
        <?php include_once ($view->contentTemplate); // incluyo el template que corresponda ?>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-10 col-md-offset-1" id="direccion">
                      <p>Av. Colón 3502 local 3, ciudad de Córdoba.<br/>TE 0351 487 0111</p>
                      <p>Tucumán 481, ciudad de Jesús María.<br/>TE  03525 606 403</p>
                      <p class="copyright">&copy;&nbsp;All rights reserved - Powered by Trend Sistemas</p>
                </div>
            </div>
        </div>
    </footer>    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="app_js/jquery-1.7.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>