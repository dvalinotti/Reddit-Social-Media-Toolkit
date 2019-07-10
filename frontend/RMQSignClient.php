<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
session_start();
/*if (isset($_POST){
	$_SESSION['username'] = $_POST['signuser'];
	$_SESSION['password'] = $_POST['signpass'];
	$_SESSION['reddituser'] = $_POST['reddituser'];
	$_SESSION['redditpass'] = $_POST['redditpass'];
}*/
if($_POST['signpass'] == $_POST['resignpass'])
{
	$client = new rabbitMQClient("RabbitMQsignup.ini","testServer");
	$request2 = array();
	$request2['type'] = "register";
	$request2['username'] = $_POST['signuser'];
	$request2['password'] = $_POST['signpass'];
	$request2['message'] = 'Register Request';
	$response2 = $client->send_request($request2);
	//$response = $client->publish($request);
	echo "client received response: ".PHP_EOL;
	print_r($response2);
	echo "\n\n";
	$file = fopen("login.log","a");
	$ip=$_SERVER['REMOTE_ADDR'];
	$space = ' ';
	$type = 'Sign Up';
	$data = $ip .$space. $_POST['signuser'] .$space. date('Y-m-d H:i:s').$space.$type. PHP_EOL;
	echo fwrite($file,$data);
	fclose($file);
	if ($response2 == "register")
	{
		header('Location: login.html');
	}
	else
	{
		header('Location: failed.php');
	}
}
else
{
	echo "Entered passwords did not match";
	echo "<br>";
	header('Refresh:5;url = signup.html');
	ob_end_flush();
?>
<!--- Start of the HTML and JS counter --->
<!--- Change the counter var and number in count to change the length of the count --->
<p>You will be redirected in <span id="count">5</span> seconds....</p>
<p> Click <a href="sign.html">here</a> if you are not redirected....</p>

<script type="text/javascript">
window.onload = function(){
(function(){
  var counter = 5;
  setInterval(function() {
    counter--;
    if (counter >= 0) {
      span = document.getElementById("count"); // to disply the element
      span.innerHTML = counter;
    }
    if (counter === 0) { // at 0 counter is cleared
        clearInterval(counter);
    }
  }, 1000); // counting in seconds
})();
}
</script>
<?php
}
?>
