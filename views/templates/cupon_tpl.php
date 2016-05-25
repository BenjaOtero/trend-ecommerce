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
<div class="modal fade" id="divCupones" role="dialog">
  <div class="modal-dialog">      
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body" align="center">
          <img src="app_images/cupon.jpg">
          <p>En toda tu compra.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>      
  </div>
</div>       

<script type="text/javascript">
    $('#divCupones').modal('show'); 
</script>            
