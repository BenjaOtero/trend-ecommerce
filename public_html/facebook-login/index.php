<?php

session_start();
require_once '/facebook-php-sdk-v4/src/Facebook/autoload.php';


$fb = new Facebook\Facebook([
  'app_id' => '{179487512408545}',
  'app_secret' => '{8a1045e3c2f1e7a3936749fd84236308}',
  'default_graph_version' => 'v2.5',
]);

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'user_likes']; // optional
$loginUrl = $helper->getLoginUrl('http://localhost/Ecommerce/trunk/public_html/facebook-login/fb-callback.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';