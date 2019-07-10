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
$client = new rabbitMQClient("RMQEmailNotif.ini","testServer");
$msg = "test message";
$user = $_POST['user'];
$email = $_POST['email'];
$yn = $_POST['yn'];
$request = array();
$request['type'] = "emailnotif";
$request['user'] = $user;
$request['email'] = $email;
$request['yn'] = $yn;
$request['message'] = $msg;
$response = $client->send_request($request);
echo $response;
?>
