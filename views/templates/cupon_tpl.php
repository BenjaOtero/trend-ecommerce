<?php
$fb = new Facebook\Facebook([
  'app_id' => '1001867536575655',
  'app_secret' => '19976532ea1af3e9c7540e07a556dc15',
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
<div class="modal fade" id="divCupones" role="dialog">
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
            <p><?php echo "Válido hasta el  ".$vencimientoCupon;?></p>
            <p>El cupón tiene un uso por persona y es intransferible</p>
          <!--   <p><a href="#">Acepto los términos de uso</a></p>
            <a href="#" style="display: inline;">Políticas de privacidad</a> -->
            <button id="cerrar-cupon" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>            
        </div>            
        
      </div>
    </div>      
  </div>
</div>       

<script type="text/javascript">
    $('#divCupones').modal('show'); 
</script>            
