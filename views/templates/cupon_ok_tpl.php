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
if (isset($_SESSION['facebook_access_token'])) {
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);            
} else {
        // getting short-lived access token
        $_SESSION['facebook_access_token'] = (string) $accessToken;
        // OAuth 2.0 client handler
        $oAuth2Client = $fb->getOAuth2Client();
        // Exchanges a short-lived access token for a long-lived one
        $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
        $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
        // setting default access token to be used in script
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
}        
$profile_request = $fb->get('/me?fields=name,first_name,last_name,email');
$profile = $profile_request->getGraphNode()->asArray();
$nombre = $profile['first_name'];
$apellido = $profile['last_name'];
$correo = $profile['email'];
?>
<div id="dialogo-cupon" align="center">
    <?php echo $nombre." ".$apellido."<br>";?>
    <?php echo $correo."<br>";?>
    <?php echo rand(1000000000, 2147483647);?>
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
  

