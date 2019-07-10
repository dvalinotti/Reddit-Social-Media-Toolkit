<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc'); 
/*session_start();
if (isset($_SESSION["username"]) && !empty($_SESSION["username"])){
}
else{
header('location: login.html');
}*/
$client = new rabbitMQClient("RMQCampaign.ini","testServer");
$msg = "test message";
$name = $_POST['subredditname'];
$title = $_POST['title'];
$post = $_POST['post'];
$delay = $_POST['delay'];
$user = $_POST['user'];
$request = array();
$request['type'] = "campaign";
$request['name'] = $name;
$request['title'] = $title;
$request['post'] = $post;
$request['hour'] = $delay;
$request['user'] = $user;
$request['message'] = $msg;
$response = $client->send_request($request);
/*
$client2 = new rabbitMQClient("RMQCampaign2.ini","testServer");
$user = $_POST['user'];
$sub = $_POST['subredditname'];
$request = array();
$request['type'] = "table_campaign";
$request['user'] = $user;
$request['subreddit'] = $sub;
$request['title'] = $title;
$request['message'] = $msg;
$response2 = $client2->send_request($request);
*/
echo $response;
//echo $response2;
?>