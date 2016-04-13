<?php
/**
 * Created by PhpStorm.
 * User: khaled
 * Date: 4/13/16
 * Time: 12:09 PM
 */
session_start();
require_once '../vendor/autoload.php';

$fb = new Facebook\Facebook([
    'app_id' => '1581448135500343',
    'app_secret' => 'f611e1c29ba537590f9b9df4f59e4407',
    'default_graph_version' => 'v2.5',
]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email', 'rsvp_event', 'user_events']; // Optional permissions
//$loginUrl = $helper->getLoginUrl('https://www.berniefb.dev/fb-callback.php', $permissions);
$loginUrl = $helper->getLoginUrl('http://52.36.36.30/fbcallback.php', $permissions);


echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';