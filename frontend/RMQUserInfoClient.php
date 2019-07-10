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
$client = new rabbitMQClient("RMQUserInfoClient.ini","testServer");
$msg = "test message";
$username = $_POST["user"];
$request = array();
$request['type'] = "user_info";
$request['username'] = $username;
$request['message'] = $msg;
$response = $client->send_request($request);
//$response = $client->publish($request);

//echo "client received response: ".PHP_EOL;
//echo $response;
echo $response;
//echo json_decode($response, true);
/*echo "\n\n";
echo $argv[0]." END".PHP_EOL;*/
?>
