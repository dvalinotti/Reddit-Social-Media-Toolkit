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
$client = new rabbitMQClient("RMQMake_Graph.ini","testServer");
$msg = "test message";
$kc = $_POST['kc'];
$user = $_POST['user'];
$request = array();
$request['type'] = "history";
$request['kc'] = $kc;
$request['user'] = $user;
$request['message'] = $msg;
$response = $client->send_request($request);
echo $response;
?>
