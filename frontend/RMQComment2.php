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
$client = new rabbitMQClient("RMQComment2.ini","testServer");
$msg = "test message";
$ID = $_POST['ID'];
$comment = $_POST['comment'];
$request = array();
$request['type'] = "post_comment";
$request['id'] = $ID;
$request['comment'] = $comment;
$request['message'] = $msg;
$response = $client->send_request($request);
echo $response;
?>
