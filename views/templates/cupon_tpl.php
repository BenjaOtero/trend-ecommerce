<?php
require_once './fblogin-v5/src/Facebook/autoload.php';
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

$loginUrl = $helper->getLoginUrl('http://localhost/trend/trunk/private_html/index.php?action=cupon&dominio='.$dominio.'&uri='.$uri);
?>
<div id="dialogo-cupon" align="center">
    
        <div class="row">
                <div class="col-xs-6 col-sm-4 col-lg-6 col-lg-offset-1" style="padding-right: 0px;">   
                    <div id="numero" align="right">
                         <?php echo $porcentaje;?>
                    </div>
                </div> 
                <div class="col-xs-6 col-sm-4 col-lg-4">   
                    <div class="row">
                        <div id="porcentaje" align="left"><p>%</p></div>
                        <div id="off" align="left"><p>OFF</p></div>
                    </div>
                </div>         
        </div>    
        <p>EN TODA TU COMPRA</p>
        <div id="facebook-login" align="center">
            <p>Logueate con facebook y obtené tu cupón</p>   
            <a href="<?php echo $loginUrl ?>">
                <img src="app_images/facebook_login.jpg">
            </a>                        
        </div>     
        <div id="privacidad">
            <p><?php echo "Válido hasta el  ".$vencimientoCupon;?></p>
            <p>El cupón tiene un uso por persona y es intransferible</p>
            <p><a href="#">Acepto los términos de uso</a></p>
            <a href="#" style="display: inline;">Políticas de privacidad</a>
            <p id="cerrar-cupon">Cerrar</p>
        </div>    
</div>                        
<script type="text/javascript">
    $("#dialogo-cupon").css(<?php echo "'border','10px solid ".$color."'";?>); 
</script>            
