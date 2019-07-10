<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
$client = new rabbitMQClient("RMQComment1.ini","testServer");
$msg = "test message";
$topic = $_POST['topic'];
$request = array();
$request['type'] = "thread_id";
$request['keyword'] = $topic;
$request['message'] = $msg;
$response = $client->send_request($request);
echo $response;
?>
