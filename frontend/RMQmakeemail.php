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
$client = new rabbitMQClient("RMQmakeemail.ini","testServer");
$msg = "test message";
$user = $_POST['user'];
$request = array();
$request['type'] = "emails";
$request['user'] = $user;
$request['message'] = $msg;
$response = $client->send_request($request);
echo $response;
?>
