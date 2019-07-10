#!/usr/bin/php
<?php
require_once('rabbitMQLib.inc');
/*
function log_message($request)
{
    $log_file = fopen($log, "a+");
    $message = "";
    $keys = array_keys($array);
    $key = current($keys);
    $written = "";

    $s = "ID: " . $log_id . "\n";
    fwrite($log_file, $s);
    $written .= $s;
    foreach ($request as &$value) {
        $s = "\t" . $key . ": " . $value . "\n";
        fwrite($log_file, $s);
        $key = next($keys);
        $written .= $s;
    }

    fwrite($log_id, "END " . $log_id . ":\n");
    $log_id++;

    return $written;
}

*/
function userinfo_DB_payload($userinfo)
{
    foreach ($userinfo as &$item) {
	echo $item . " ";
    }
    echo gettype($userinfo);
    $db = new mysqli('3.16.251.147', 'emile', 'Password7!', 'authtest');
    $s = "SELECT * FROM reddit_data WHERE redditorID ='". $userinfo[1] . "';";
    ($t = mysqli_query($db, $s) or die(mysqli_errno($db)));
    $num = mysqli_num_rows($t);
    //echo $num;
    if ($num == 1) {
        echo "already exists";
        $result = true;
    } else {
        //echo var_dump($userinfo);
        $verified = 0;
        if ($userinfo[3] == 'True') {
            $verified = 1;
        }
        //echo($verified);
        $s = "INSERT INTO reddit_data VALUES('".$userinfo[1]."', '".$userinfo[0]."', CAST('". $userinfo[2] ."' AS DATE), " . $verified . ");";
        //echo $s;
        $t = (mysqli_query($db, $s) or die(mysqli_errno($db)));
        echo "recorded in database";
        $result = true;
    }
    //echo $result;
    return $result;
}


function campaign_DB_payload($campaigninfo)
{
    foreach ($campaigninfo as &$item) {
	echo $item . " ";
    }
    echo gettype($campaigninfo);
    $db = new mysqli('3.16.251.147', 'emile', 'Password7!', 'authtest');
    $s = "SELECT * FROM campaign WHERE title ='". $campaigninfo[2] . "';";
    ($t = mysqli_query($db, $s) or die(mysqli_errno($db)));
    $num = mysqli_num_rows($t);
    if ($num < 1) {
        $s = "INSERT INTO campaign VALUES('".$campaigninfo[2]."', '".$campaigninfo[1]."', '". $campaigninfo[3] ."', '" . $campaigninfo[0] . "');";
        //echo $s;
        $t = (mysqli_query($db, $s) or die(mysqli_errno($db)));
        if ($t) {
	    echo "recorded in database";
            $result = true;
	}
	else { $result = false; }
    }
    //echo $result;
    return $result;
}


function campaignHistory_C_payload($campaignHistory)
{
	$db = new mysqli('3.16.251.147', 'emile', 'Password7!', 'authtest');
	$s = "SELECT id FROM campaign WHERE user ='" . $campaignHistory . "';";

	$t = mysqli_query($db, $s);
	$c = 0;
	$arr = [];

	
	while ($row = mysqli_fetch_array($t))
		{
			//loops though DB to grab the post ID
			$arr[$c] = $row[0];
			
			$c = $c + 1 ;
		}
	if (empty($arr)){
		return('There are no campaigns');
	}

	//Encodes the array $arr so that python can read
	$arr2 = json_encode($arr);

	//echo $arr2;

	exec("python CAMPAIGN_HISTORY_C.py ".$arr2 ,$output,$result);


	return $output[0];
}

function campaignHistory_K_payload($campaignHistory)
{
	$db = new mysqli('3.16.251.147', 'emile', 'Password7!', 'authtest');
	$s = "SELECT id FROM campaign WHERE user ='" . $campaignHistory . "';";

	$t = mysqli_query($db, $s);
	$c = 0;
	$arr = [];

	while ($row = mysqli_fetch_array($t))
		{
			//loops though DB to grab the post ID
			$arr[$c] = $row[0];
			
			$c = $c + 1 ;
		}
	if (empty($arr)){
		return('There are no campaigns');
	}

	//Encodes the array $arr so that python can read
	$arr2 = json_encode($arr);

	//echo $arr2;

	exec("python CAMPAIGN_HISTORY_K.py ".$arr2 ,$output,$result);

	//var_dump ($output);
	return $output[0];
}


function email_update($user)
{
//Finds the email connected to the user
$db = new mysqli('3.16.251.147', 'emile', 'Password7!', 'authtest');
$s1 = "SELECT email FROM email_notif WHERE username = '". $user . "';";


$t1 = mysqli_query($db, $s1);
$c = 0;
$arr = [];
while ($row = mysqli_fetch_array($t1))
{
	//loops though DB to grab the post ID
	$arr[$c] = $row[0];
	
	$c = $c + 1 ;
}
if (empty($arr)){
	return('You have no E-mails associated with this account.');
}

//Encodes the array $arr so that python can read
$arr2 = json_encode($arr);

//echo $arr2;

//Finds the campaigns from the user

$s2 = "SELECT id FROM campaign WHERE user = '". $user . "';";


$t2 = mysqli_query($db, $s2);
$c2 = 0;
$arr3 = [];
while ($row = mysqli_fetch_array($t2))
{
	//loops though DB to grab the post ID
	$arr3[$c2] = $row[0];
	
	$c2 = $c2 + 1 ;
}

$arr4 = json_encode($arr3);
exec("python CAMPAIGN_UPDATE.py '".$arr2."' '".$arr4."' '".$user."'" ,$output,$result);

var_dump($output);
return('Request received');
}
?>
