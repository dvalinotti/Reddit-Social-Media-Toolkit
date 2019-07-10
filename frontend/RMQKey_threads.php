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
$client = new rabbitMQClient("RMQKey_threads.ini","testServer");
$msg = "test message";
$keyword = $_POST['keyword'];
$limit = $_POST['limit'];
$request = array();
$request['type'] = "key_threads";
$request['keyword'] = $keyword;
$request['limit'] = $limit;
$request['message'] = $msg;
$response = $client->send_request($request);
echo $response;
?>
