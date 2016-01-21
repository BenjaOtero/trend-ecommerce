<?php
session_start();
require_once __DIR__ . '/src/Facebook/autoload.php';
use Facebook\FacebookSession; 
use Facebook\GraphUser;
use Facebook\FacebookSDKException;

// grab your app's APP_ID and APP_SECRET from the developer dashboard   
FacebookSession::setDefaultApplication('179487512408545', '8a1045e3c2f1e7a3936749fd84236308');

// create a FacebookSession with the short-lived access token 
$session = new FacebookSession('CAACEdEose0cBAFZBjLbNyOi22TWY639st3vOG2w6ifpZCLXhVuPBwpItxP7r1uEA31ZBAoHGLjUoZCLvSZAqUacO68YDw3tQIepAwIUS9LkcJm6PjK0cRG3QBTjOHKZCjmncpLmbXAIghl8TuxX5MPX0zoH1NQpBAtS7P3QRGNCI62c28iTlQhI0shUOj89b4ZD');

// Get the AccessToken entity. 
$accessToken = $session->getAccessToken();

try { // get a long-lived token from the short-lived one 
    echo $longLivedAccessToken = $accessToken->extend(); 
} catch(FacebookSDKException $e) { 
    echo 'Error extending the short-lived access token: ' . $e->getMessage(); 
    exit; 
}