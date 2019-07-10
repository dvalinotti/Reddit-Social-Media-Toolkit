<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
</head>
<?php 
session_start();

if (isset($_SESSION["username"]) && !empty($_SESSION["username"])){

}
else{
header('location: login.html');
}
$user = $_SESSION["username"];
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
	<div class="header tracking-in-expand-fwd-top" style="margin-bottom: 1em; width: 100%">
		<h3 class="user-header text-pop-up-top">User Settings</h3>
		<h2 class="user-header text-pop-up-top" style="margin-top: 1em; font-size: 3em !important">
			<?php echo ucfirst($user); ?>
		</h2>
<script> var user = "<?php echo $user; ?>"</script>
	</div>
	<div class="slide-in-blurred-right" style="width: 100%;">
		<!-- <div class="content-wrapper content-wrapper--settings">
			<div class="content-wrapper--inner">
				<fieldset class="content-wrapper" id="field" style="width: inherit;">
					<legend align="center">Change Password</legend>
					<form action="RMQClient.php" method="post">
						<p>Old Password</p><input id="ppassword" type="password" name="ppassword" autocomplete="off" placeholder="Past Password"
						 Required><br><br>
						<p>New Password</p><input id="npassword" type="password" name="npassword" autocomplete="off" placeholder="New Password"
						 Required><br><br>
						<div class="wrapper">
							<input type="submit" name="Submit" id="SettingSubmit" value="submit">
						</div>
						<br>
					</form>
				</fieldset>
			</div>
		</div> -->
		<div class="content-wrapper content-wrapper--settings">
			<div class="content-wrapper--inner">
				<fieldset id="field" style="width: inherit;">
					<legend align="center">Receive Email Notifications</legend>
					<form>
						<form>
							<p>Email</p><input id="email" type="text" name="email" autocomplete="off" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
							 Required><br><br>
							<select id="yn">
								<option value="Yes">Yes</option>
								<option value="No"> No </option>
							</select>
							<button type="button" onclick='send_email();'>Submit Email</button>
			</div>
			<br>
			</form>
			</fieldset>
			<div id="output3">
			</div>
			 <fieldset id="field" style="width: 25%">
			<legend align="center">Receive Email Notifications</legend>
			<form>
					<button type="button" onclick='make_email();'>Test Email</button>
			</div>
			<br>
			</form>
			<center>
			<div id="output4">
			</div>
			<center>
			</fieldset>
		</div>
	</div>
	</div>
</body>
