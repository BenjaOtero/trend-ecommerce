<?php
session_start();
require_once __DIR__ . '/src/Facebook/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '179487512408545',
  'app_secret' => '8a1045e3c2f1e7a3936749fd84236308',
  'default_graph_version' => 'v2.4',
  ]);
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; // optional
	
try {
	if (isset($_SESSION['facebook_access_token'])) {
		$accessToken = $_SESSION['facebook_access_token'];
	} else {
  		$accessToken = $helper->getAccessToken();
	}
} catch(Facebook\Exceptions\FacebookResponseException $e) {
 	// When Graph returns an error
 	echo 'Graph returned an error: ' . $e->getMessage();
  	exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
 	// When validation fails or other local issues
	echo 'Facebook SDK returned an error: ' . $e->getMessage();
  	exit;
 }
if (isset($accessToken)) {
	if (isset($_SESSION['facebook_access_token'])) {
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
                
            // Logged in!
            $oAuth2Client = $fb->getOAuth2Client();
            $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;  
            
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

	// getting basic info about user
	try {
		$profile_request = $fb->get('/me?fields=name,first_name,last_name,email');
		$profile = $profile_request->getGraphNode()->asArray();
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
		// When Graph returns an error
		echo 'Graph returned an error: ' . $e->getMessage();
		session_destroy();
		// redirecting user back to app login page
		header("Location: ./");
		exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
		// When validation fails or other local issues
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}
	
        // parametros posibles para $linkData
	/* $post = array( 
		"access_token"=>$session["access_token"],
		"description"=>"Te has suscrito a la aplicaciÃ³n del curso de Facebook que ha creado Polin para el 2011",
		"link"=>$appUrl . "?redirect=" . base64_encode("http://p0l.in"),
		"caption"=>"AplicaciÃ³n de pruebas por Polin",
		"picture"=>"http://i265.photobucket.com/albums/ii229/polinidoocom/logo/v1_1/polin_logo_260x260.gif",
		"name"=>"AplicaciÃ³n de pruebas Polin"
		);      */           
        
        $linkData = [
          'message' => 'User provided message (último)',
          'link' => 'http://karminna.com/index.php?action=loNuevoOutside&genero=2&item=0'                        
          ];        

        try {
          // Returns a `Facebook\FacebookResponse` object
          $response = $fb->post("/880469382051500/feed", $linkData, $longLivedAccessToken);          
          
          
		$pages_request = $fb->get('/me/accounts?fields=name,access_token');                                
		$pages = $pages_request->getGraphEdge()->asArray();  
               // $token_page = $pages['access_token'];
          
      //    $response2 = $fb->post("/1673807476233899/feed", $linkData, $accessToken);
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
          echo 'Graph returned an error: ' . $e->getMessage();
          exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
          echo 'Facebook SDK returned an error: ' . $e->getMessage();
          exit;
        }

        $graphNode = $response->getGraphNode();

        echo 'Posted with id: ' . $graphNode['id'];
        echo "<br>";
     //   var_dump($pages);

} else {
	// replace your website URL same as added in the developers.facebook.com/apps e.g. if you used http instead of https and you used non-www version or www version of your website then you must add the same here
	$loginUrl = $helper->getLoginUrl('http://localhost/Ecommerce/trunk/public_html/fblogin-v5/post_page.php', $permissions);
	echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
}

