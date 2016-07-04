<?php
$fb = new Facebook\Facebook([
  'app_id' => '1068588159868715',
  'app_secret' => 'd3790d1f47df4805b47976f16199fd89',
  'default_graph_version' => 'v2.6',
  ]);
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; // optional
	
if (isset($_SESSION['facebook_access_token'])) {
        $accessToken = $_SESSION['facebook_access_token'];
} else {
        $accessToken = $helper->getAccessToken();
}
$dominio = $_SERVER['HTTP_HOST'];
$uri = $_SERVER['REQUEST_URI']; //La URI que se empleó para acceder a la página. Por ejemplo: '/index.html'. 
//$loginUrl = $helper->getLoginUrl('http://localhost/trend/trunk/private_html/index.php?action=cupon&dominio='.$dominio.'&uri='.$uri);
//$loginUrl = $helper->getLoginUrl('http://localhost/Ecommerce/trunk/public_html/index.php?cupon=cupon');
$loginUrl = $helper->getLoginUrl('http://karminna.com/index.php?cupon=cupon');
?>
<div class="modal fade hidden-xs" id="divCupones" role="dialog">
  <div class="modal-dialog">      
    <!-- Modal content-->
    <div class="modal-content">
      <div id="div-cupones-body" class="modal-body" align="center">
          <img src="app_images/cupon.jpg">
          <p>En toda tu compra.</p>
            <div id="facebook-login" align="center">
                <p>Logueate con facebook y obtené tu cupón</p>   
                <a href="<?php echo $loginUrl ?>">
                    <img src="app_images/facebook_login.jpg">
                </a>                        
            </div>              
      </div>
      <div class="modal-footer">
        <div id="privacidad">
            <p style="font-weight: bold;color: #333333;">Válido pago contado efectivo únicamente</p>
            <p><?php echo "Válido hasta el  ".$vencCuponFormat;?></p>
            <p>El cupón tiene un uso por persona y es intransferible</p>            
            <p>No aplicable a otras promociones</p>
          <!--   <p><a href="#">Acepto los términos de uso</a></p>
            <a href="#" style="display: inline;">Políticas de privacidad</a> -->
            <button id="cerrar-cupon" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>            
        </div>            
        
      </div>
    </div>      
  </div>
</div> 
<div id="divCupones-xs">
    <div class="row hidden-lg hidden-md hidden-sm">
        <div class="col-xs-12 col-md-10 col-md-offset-1" style="background-color: rgb(255, 255, 255);">
            <div align="center">
                <br>
                <img src="app_images/cupon_xs.jpg">
                <p>En toda tu compra.</p>
                  <div id="facebook-login" align="center">
                      <p>Logueate con facebook y obtené tu cupón</p>   
                      <a href="<?php echo $loginUrl ?>">
                          <img src="app_images/facebook_login.jpg">
                      </a>                        
                  </div>              
            </div>
              <div id="privacidad">
                  <p style="font-weight: bold;color: #333333;">Válido pago contado efectivo únicamente</p>
                  <p><?php echo "Válido hasta el  ".$vencCuponFormat;?></p>
                  <p>El cupón tiene un uso por persona y es intransferible</p>            
                  <p>No aplicable a otras promociones</p>
                <!--   <p><a href="#">Acepto los términos de uso</a></p>
                  <a href="#" style="display: inline;">Políticas de privacidad</a> -->           
              </div>                    
            
        </div>
    </div>
</div>

<script type="text/javascript">
    var ventana_ancho = $(window).width();
    if(ventana_ancho>750)
    {
        $('#divCupones').modal('show'); 
    }    	
</script>            
