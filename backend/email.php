#!/usr/bin/php
<?php
include('functions.inc');
$db = new mysqli('3.16.251.147', 'emile', 'Password7!', 'authtest');
$s1 = "SELECT username FROM email_notif;";


$t1 = mysqli_query($db, $s1);
$users = mysqli_fetch_array($t1);
$result = array_unique($users);
foreach($result as &$user ) {
	print($user);
	email_update($user);
}
?>
