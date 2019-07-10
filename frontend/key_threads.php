<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
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
	<div class="scroller">
		<div class="content-wrapper main" style="width: 90%; margin: 2em auto; ">
			<div class="content-title text-pop-up-top">
				<h4>Key Threads</h4>
			</div>
			<div class="slide-in-blurred-bottom" style="width: 100%; height: inherit;">
				<div class="content-subtitle">
					<p>Search for the highest-scoring recent posts about the given topic.</p>
				</div>
				<div class="content-wrapper--inner">
					<div class="fields--graph">
						<div class="fields--graph-left" style="width:100%; ">
							<fieldset id="field4">
								<legend align="center">Key Threads</legend>
								<form>
									<label for="keyword" style="width: 100%"> Enter a Key Word</label><br>
									<input id="keyword" type="text" name="keyword" autocomplete="off" placeholder="keyword" Required><br><br>
									<div class="numbers">
										<label for="limit"> Select a Number to limit the results:</label><br>
										<select id="limit">
											<option value="5">5</option>
											<option value="10">10</option>
											<option value="15">15</option>
											<option value="20">20</option>
											<option value="25">25</option>
											<option value="30">30</option>
											<option value="35">35</option>
											<option value="40">40</option>
											<option value="45">45</option>
											<option value="50">50</option>
										</select>
									</div>
									<br>
									<button type="button" onclick='key_threads();'>Find Key Threads</button>
								</form>
							</fieldset>
							<fieldset id="field3">
								<legend align="center">Threads</legend>
								<div id="threads">
									<div id="output" style="overflow-x: hidden">
									</div>
								</div>

							</fieldset>
							<fieldset id="field5" style="margin-left: -0.75em;">
							<legend align="center">Graph</legend>

							<div id="output2">
							</div>
						</fieldset>
						</div>
						

					</div>
				</div>
			</div>
		</div>

</body>