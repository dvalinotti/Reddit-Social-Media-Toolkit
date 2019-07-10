<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
</head>
<script type="text/javascript" src="sidenav.js"></script>
<script type="text/javascript" src="fns.js"></script>
<?php 
session_start();
if (isset($_SESSION["username"]) && !empty($_SESSION["username"])){

}
else{
header('location: login.html');
}
?>

<body>
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
	<div class="post-wrapper">
		<div class="content-wrapper main" style="margin: 0 auto;width: 90%;z-index: 1;">

			<div class="content-wrapper--inner" style="height: 100%">
				<div class="content-title text-pop-up-top">
					<h4 style="font-size: 0.9em">Post Comment</h4>
				</div>
				<div class="slide-in-blurred-bottom">
					<div class="content-subtitle">
						<p>Make a comment on a submission using the Topic ID. To find the Topic ID, use "Find Topic ID" button. </p>
						<p>Topic ID's can also be found in a submission's URL before the post title.</p>
					</div>
					<a href="findid.php" class="content-subtitle">
						<p>How to find a topic ID yourself!</p>
					</a>

					<div class="fields">
						<fieldset id="field2">
							<legend align="center">Topic ID</legend>
							<!-- <button onclick="hidetopic()">Find Topic ID</button> -->
							<div id="topic" style="display: block">
								<form>
									<label for="topic01"> Enter a Topic</label><br>
									<input id="topic01" type="text" name="topic" autocomplete="off" placeholder="Topic"><br><br>
									<button type="button" onclick='comment_topic();'>Find Topic ID</button>
								</form>
								<fieldset id="field">
									<legend align="center">Results</legend>
									<div id="output1" style="width: 100%;height:150px;line-height:1em;overflow:scroll;padding:5px;background-color: #FFFFFF;">
									</div>
							</div>
						</fieldset>
						</fieldset>
						<fieldset id="field2">
							<legend align="center">Make Comment</legend>
							<!-- <button onclick="hide()">Make Comment</button> -->
							<div id="comment" style="display: block">
								<form>
									<label for="ids"> Enter a ID</label><br>
									<input id="ids" list="listofids" style="width: 100%; overflow:wrap;" placeholder="Post ID">
									<datalist id="listofids">
									</datalist>
									<div id="fulltext">
										<div>
											<label for="comment2"> Enter a Comment</label><br>
											<textarea id="comment2" rows="10" cols="40" type="text" name="comment" autocomplete="off" placeholder="Comment"></textarea><br><br>
											<button type="button" onclick='comment_post();'>Comment</button>
								</form>
						</fieldset>
						<fieldset id="field2">
							<legend align="center">Output</legend>
							<div id="output2" style="max-width: 100%">
							</div>
						</fieldset>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>

</body>

</html>