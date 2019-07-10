<head>
	<link rel="stylesheet" href="styles.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<?php
session_start();
$user  = $_SESSION["username"];
if (isset($_SESSION["username"]) && !empty($_SESSION["username"])){

}
else{
header('location: login.html');
}
?>
<script>
	var user1 = "<?php echo $user; ?>";
</script>

<body>
	<script type="text/javascript" src="sidenav.js"></script>
	<script type="text/javascript" src="fns.js"></script>

	<div id="nav">
		<ul>
			<li><a href="/homepage.php">Home</a></li>
			<li><a href="/Reddit_Interface.php">Reddit Interface</a></li>
			<li><a href="/showgraph.php">Campiagn Graph</a></li>
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
					<h4>Graphs</h4>
				</div>
				<div class="content-subtitle">
				</div>

				<div class="fields--graph">
					<div class="fields--graph-left ">
						<fieldset id="field6" class="slide-in-blurred-left" style="animation-delay: 0.25s">
							<legend align="center">Find User</legend>
							<form>
								<label for="graph"> Select to show based on Karma or Comments</label><br>
								<select id="kc">
									<option value="karma">Karma</option>
									<option value="comments"> Comments </option>
								</select>
								<button type="button" onclick='make_graph();'>Make Graph</button>
							</form>

						</fieldset>
					</div>
					<fieldset id="field5" class="slide-in-blurred-right">
						<legend align="center">Graph</legend>
						<div id="output2">
							
						</div>

					</fieldset>
				</div>
			</div>
		</div>
</body>