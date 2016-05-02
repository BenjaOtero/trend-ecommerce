<?php
session_start();
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
$loginUrl = $helper->getLoginUrl('http://localhost/Ecommerce/trunk/public_html/fblogin-v5/cupones.php', $permissions);
echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
?>
<div id="dialogo-cupon" align="center">
        <img src="app_images/cupon.jpg">
        <p>EN TODA TU COMPRA</p>
        <div id="facebook-login" align="center">
            <p>Logueate con facebook y obtené tu cupón</p>   
            <a href="<?php echo $loginUrl ?>" target='_blank'>
                <img src="app_images/facebook_login.jpg">
            </a>                        
        </div>     
        <div id="privacidad">
            <p>Válido desde el 00/00/0000 hasta el 00/00/0000</p>
            <p>El cupón tiene un uso por persona y es intransferible</p>
            <p><a href="#">Acepto los términos de uso</a></p>
            <a href="#">Políticas de privacidad</a>
        </div>
    
</div>                        
            
