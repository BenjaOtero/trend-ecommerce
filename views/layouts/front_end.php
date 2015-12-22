<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>KARMINNA</title>

    <!-- Bootstrap -->
    <link href="./bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->	   
	<link rel="stylesheet" href="app_css/style.css" type="text/css" media="screen" />    
        <link rel="stylesheet" href="app_css/items_articulos.css" type="text/css" media="screen" /> 
        <link rel="stylesheet" href="app_css/articulo.css" type="text/css" media="screen"  />
        <link rel="stylesheet" href="app_css/jquery.jqzoom.css" type="text/css" media="screen" /> 
     <!--   <link rel="stylesheet" href="app_css/demo.css" type="text/css" media="screen" /> -->
	<script type="text/javascript" src="app_js/jquery-1.10.2.min.js"></script> 
	<!-- <script type="text/javascript" src="app_js/jquery-1.7.1.min.js"></script> -->
	<script type="text/javascript" src="./bootstrap-3.3.5-dist/bootstrap.js"></script> 
        <script src='app_js/jquery.zoom.js'></script>
	<script type="text/javascript" src="app_js/functions_f.js"></script>        
            	
  </head>
  <body>  
    <!-- Loader Bootstrap -->
      <div class="container">    
          <div class="modal fade bs-example-modal-sm" id="myPleaseWait" tabindex="-1"
              role="dialog" aria-hidden="true" data-backdrop="static">
              <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title">
                              <span class="glyphicon glyphicon-time">
                              </span>Please Wait
                           </h4>
                      </div>
                      <div class="modal-body">
                          <div class="progress">
                              <div class="progress-bar progress-bar-info
                              progress-bar-striped active"
                              style="width: 100%">
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>               
      </div>         
    <header id="main-header">
        <div id="div-header-xs" class="visible-xs">
            <div style="overflow: hidden">
                <img src="app_images/header_xs.jpg" class="" alt="">
                <h1 class="main-logo">KARMINNA<span>ON LINE STORE</span></h1>
                <br />
            </div>                
        </div>          
        <div class="container">            
            <div class="row hidden-xs">
                <div class="col-xs-12 col-md-10 col-md-offset-1" id="div-header">
                    <h1 class="main-logo">KARMINNA<span class="ocote">ON LINE STORE</span></h1>
                </div>        
            </div>               
        </div>    
        <?php include_once ($view->generosTemplate); // incluyo el template que corresponda ?>
    </header>
    <div id="div-contenido">      
        <?php include_once ($view->contentTemplate); // incluyo el template que corresponda ?>
    </div>
    <footer>
        <div class="container">
            <div class="row hidden-xs">
                <div class="col-xs-12 col-md-10 col-md-offset-1 direccion">
                      <p>Av. Colón 3502 local 3, ciudad de Córdoba.<br/>TE 0351 487 0111</p>
                      <p>Tucumán 481, ciudad de Jesús María.<br/>TE  03525 606 403</p>
                      <p class="copyright">&copy;&nbsp;All rights reserved - Powered by Trend Sistemas</p>
                </div>
            </div>
            <div class="row visible-xs" style="overflow: hidden;">
                <img src="app_images/footer_xs.jpg" class="" alt="">
                <div class="col-xs-12 direccion">                    
                      <p>Av. Colón 3502 local 3, ciudad de Córdoba.<br/>TE 0351 487 0111</p>
                      <p>Tucumán 481, ciudad de Jesús María.<br/>TE  03525 606 403</p>
                      <p class="copyright">&copy;&nbsp;All rights reserved - Powered by Trend Sistemas</p>            
                </div>
            </div>              
        </div>
    </footer>    
  </body>
</html>