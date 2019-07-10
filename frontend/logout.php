<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
</head>

<?php
session_start();

// Unset all of the session variables.
$_SESSION["username"] = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finally, destroy the session.
session_destroy();
header('Refresh:5;url = login.html');
?>
<!--- Start of the HTML and JS counter --->
<!--- Change the counter var and number in count to change the length of the count --->
<div class="main">
	<div class="main-body slide-in-blurred-top" style="text-align: center;">
<p> Session is being destroyed</p>
<p>You will be redirected in <span id="count">5</span> seconds....</p>
<p> Click <a href="login.html">here</a> if you are not redirected....</p>
</div>
</div>
<script type="text/javascript">
	window.onload = function () {
		(function () {
			var counter = 5;
			setInterval(function () {
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

</html>