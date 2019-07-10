<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client = new rabbitMQClient("PushRMQ.ini","testServer");
if (isset($argv[1]))
{
  $msg = $argv[1];
}
else
{
  $msg = "test message";
}

$request = array();
$request['type'] = $_POST['type'];
$request['destination'] = $_POST['destination'];
$request['version'] = $_POST['version'];
$request['message'] = $msg;
$response = $client->send_request($request);
//$response = $client->publish($request);

echo $response;
?>