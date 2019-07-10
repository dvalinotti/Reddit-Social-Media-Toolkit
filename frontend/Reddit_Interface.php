<html>


<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles.css">
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
		<ul class="navlist">
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
	<div class="main slide-in-blurred-bottom" style="padding-top: 4em; margin-top:0;">
		<div class="interface-header text-pop-up-top" style="height: 25%">
			<h3 class="main-header" style="width: 80%; ">Reddit Social Media Aggregator</h3>
		</div>

		<div class="main-body" style="padding-top: 0em">
			<p><br><br><br></p>
			<p> <b>Start Campaign</b>: Starts a campaign(allowing for multiple topics at set intervals) or posts a topic to that
				Sub-Reddit
				Requires -> A subreddit name , a title, and post. <br>
				Optional -> Enter a delay ( Leaving it empty will result in an immediate post)<br>
				Returns -> Text syaing the campaign was started</p>
			<p> <b> Comment</b>: Posts a comment to a specific topic.<br>
				Requires:<br> Topic -> a topic <br> Comment -> Topic ID<br>
				Returns -> Text saying the comment was made</p>
			<p><b>Key Threads</b>: Finds the top threads for the specified topic<br>
				Requires -> a topic(keyword)<br>
				Optional -> Limiter(Limit number of results)<br>
				Returns -> Key threads related to the topic provided</p>
					<p><b>Key Players</b>: Finds the top players(redditors) for the specified topic<br>
						Requires -> a topic(keyword)<br>
						Optional -> Limiter(Limit number of results)<br>
						Returns -> Key Players associated to the topic provided</p>
							<p><b>Find User</b>: Checks if the username exists<br>
								Requires -> a username<br>
								Returns -> NULL if username does not exist or Infomation about the username if it exists</p>

		</div>
	</div>
</body>
</html>