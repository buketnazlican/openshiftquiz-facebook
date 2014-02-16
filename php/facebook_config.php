<?php
$app_id = getenv("FBAPPID");
$app_secret = getenv("FBAPPSECRET");
$app_namespace = getenv("FBNAMESPACE");
$app_url = 'https://apps.facebook.com/' . $app_namespace . '/';
$scope = 'email,publish_actions';

// Init the Facebook SDK
$facebook = new Facebook(array(
    'appId'  => $app_id,
    'secret' => $app_secret,
));
// Get the current user
$user_id = $facebook->getUser();