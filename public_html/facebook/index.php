<?php
session_start();
require_once '/facebook-php-sdk-v4/src/Facebook/autoload.php';


$fb = new Facebook\Facebook([
  'app_id' => '{994983953896942}',
  'app_secret' => '{d1c9f5097964f7604661627e918f0ff3}',
  'default_graph_version' => 'v2.5',
]);

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'user_likes']; // optional
$loginUrl = $helper->getLoginUrl('http://{your-website}/login-callback.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';