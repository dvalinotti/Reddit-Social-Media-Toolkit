<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
echo "sending msg";
$client = new rabbitMQClient("RollbackRMQ.ini","testServer");
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
$request['layer'] = $_POST['layer'];
$request['message'] = $msg;
var_dump($request);
$response = $client->send_request($request);
//$response = $client->publish($request);

echo $response;