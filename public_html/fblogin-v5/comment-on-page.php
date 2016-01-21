<?php
define('FACEBOOK_SDK_V4_SRC_DIR', '/PATH/TO/fb/src/Facebook/'); 
require 'fb/autoload.php'; 

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
// use Facebook\GraphUser; // edit 2015-11-03: not used
use Facebook\FacebookRequestException;

FacebookSession::setDefaultApplication('YOUR_APP_ID', 'YOUR_APP_SECRET');

$neverExpiringToken = 'NEVER-EXPIRING_PAGE_ACCESS_TOKEN';
$pageID = 'PAGE_ID';

// create a FacebookSession with the never-expiring page access token 
$session = new FacebookSession($neverExpiringToken);

$page_post = (new FacebookRequest( $session, 'POST', '/'. $page_id .'/feed', array(
    'access_token' => $access_token,
    'name' => 'Facebook API: Posting As A Page using Graph API v2.x and PHP SDK 4.0.x',
    'link' => 'https://www.webniraj.com/2014/08/23/facebook-api-posting-as-a-page-using-graph-api-v2-x-and-php-sdk-4-0-x/',
    'caption' => 'The Facebook API lets you post to Pages you administrate via the API. This tutorial shows you how to achieve this using the Facebook PHP SDK v4.0.x and Graph API 2.x.',
    'message' => 'Check out my new blog post!',
  )))->execute()->getGraphObject()->asArray();