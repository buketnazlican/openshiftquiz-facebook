<?php
// Require the facebook sdk for php
include("facebook-api/facebook.php");

// Require the facebook configuration file we created
require 'facebook_config.php';

// Post to the users timeline (feed)
$facebook->api('/me/feed', 'POST',
    array(
        // The link to post
        'link' => $_REQUEST['link'],
        // The message to post
        'message' => $_REQUEST['message']
    ));

