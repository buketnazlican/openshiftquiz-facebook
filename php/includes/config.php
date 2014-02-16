<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
//Database configuration, based on HTTP_HOST in url;
if (!preg_match("/rhcloud.com/",$_SERVER['HTTP_HOST'])) {
    $db_user = 'root';
    $db_pass = 'root';
    $db_host = 'localhost';
    $db_port = '3306';
    $db_name = 'openshiftquiz';
} else {
    $db_user = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
    $db_pass = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
    $db_host = getenv('OPENSHIFT_MYSQL_DB_HOST');
    $db_port = getenv('OPENSHIFT_MYSQL_DB_PORT');
    $db_name = getenv('OPENSHIFT_APP_NAME');
}

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
$mysqli->select_db($db_name);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}