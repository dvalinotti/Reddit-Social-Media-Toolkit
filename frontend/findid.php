<!doctype html>
<html>

<head>
	<link rel="stylesheet" href="styles.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php 
session_start();
if (isset($_SESSION["username"]) && !empty($_SESSION["username"])){

}
else{
header('location: login.html');
} 
?>

<body>
	<script type="text/javascript" src="sidenav.js"></script>
	<script type="text/javascript" src="fns.js"></script>
	<div id="nav">
		<ul>
			<li><a href="/homepage.php">Home</a></li>
			<li><a href="/Reddit_Interface.php">Reddit Interface</a></li>
			<li><a href="/showgraph.php">Campaign Graph</a></li>
			<li><a href="/user.php">User</a></li>
			<li><a href="/setting.php">Setting</a></li>
			<li><a href="/logout.php">Log Out</a></li>
		</ul>
	</div>
	<div class="sidenav-wrapper">
		<div id="main">
			<span style="font-size:30px;cursor:pointer" onclick="toggleNav()">&#9776;</span>
		</div>
		<div id="sidenav" class="sidenav">
			<div id="sidenav-content" class="sidenav-content">
				<a href="campaign.php"> Start Campaign</a>
				<a href="post.php"> Comment</a>
				<a href="key_threads.php"> Key Threads</a>
				<a href="key_players.php"> Key Players</a>
				<a href="finduser.php">Find User</a>
			</div>
		</div>
	</div>

	<div class="main" style="padding-top: 0">

		<div class="content-wrapper main slide-in-blurred-bottom" style="width: 90%; margin: 2em auto; font-size: 1.125em;">
			<div class="header" style="z-index: 0; margin: 0">
				<h3 class="text-pop-up-top" style="text-align: center; margin-top: 0">How to find a Topic ID<br> </h3>
			</div>
			<div class="other">
				<div class="main-body--innerborder shadow-drop-center ">
					<p>1. Go to <a href="https://www.reddit.com">Reddit.com</a>
						<p>2. Find the thread you want the ID of.
							<p>3. Open the thread and look at the URL. The string highlighted in the image below is the Topic ID.</p>
				</div>
			</div>
		</div>


	</div>
</body>

</html>