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
		<div id="sidenav" class="sidenav" style="black">
			<div id="sidenav-content" class="sidenav-content">
				<a href="campaign.php"> Start Campaign</a>
				<a href="post.php"> Comment</a>
				<a href="key_threads.php"> Key Threads</a>
				<a href="key_players.php"> Key Players</a>
				<a href="finduser.php">Find User</a>
			</div>
		</div>
	</div>
	<div class="scroller">
	<div class="content-wrapper">
		<div class="content-wrapper--inner">
			<div class="content-title text-pop-up-top">
				<h4>User Search</h4>
			</div>
			<div class="content-subtitle slide-in-blurred-bottom">
				<p>Check to see if a user exists and get basic information from their profile.</p>
			</div>
			<div class="slide-in-blurred-bottom">
				<div class="fields">
				<fieldset id="field3">
					<legend align="center">Find User</legend>
					<form>
						<label for="username"> Enter a Username to find if the user exists</label><br>
						<input id="username" type="text" name="username" autocomplete="off" placeholder="Username" Required><br><br>
						<button type="button" onclick='send_info();'>Send Username</button>
						<p>If NULL, user does not exists</p>
					</form>
				</fieldset>
				<fieldset id="field2">
					<legend align="center">Output</legend>
					<div class="result" w>
						<div id="output1"></div>
						<div id="output2"></div>
						<div id="output3"></div>
						<div id="output4"></div>
					</div>
					</font>
				</fieldset>
</div>
</div>
			</div>
		</div>
	</div>

</body>