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
}?>

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
		<div class="content-wrapper main">
			<div class="content-wrapper--inner">
				<div class="content-title text-pop-up-top">
					<h4>Key Players</h4>
				</div>

				<div class="slide-in-blurred-bottom " style="width: 100%; height: inherit;">

					<div class="content-subtitle">
						<p>Search for the users who have posted the most comments on top-scoring posts related to the given topic.</p>
					</div>

					<div class="fields--graph">
						<div class="fields--graph-left">
							<fieldset id="field3">
								<legend align="center">Key Players</legend>
								<div class="formcontent">
									<form>
										<label for="keyword"> Enter a Key Word</label><br>
										<input id="keyword" type="text" name="keyword" autocomplete="off" placeholder="Keyword" Required><br><br>
										<div class="limit-wrapper">
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
											</select><br>
										</div>
										<button type="button" onclick='key_users();'>Find Key Users</button>
										<p> Warning this may take a while</p>
									</form>
							</fieldset>
							<fieldset id="field6">
								<legend align="center">Users</legend>
								<div id="players">
								</div>

							</fieldset>
						</div>

						<fieldset id="field5">
							<legend align="center">Graph</legend>

							<div id="output">

							</div>

						</fieldset>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>