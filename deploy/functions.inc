#!/usr/bin/php
<?php
include('Net/SSH2.php');
include('Crypt/RSA.php');
include('Net/SCP.php');
include('Net/SFTP.php');
include('Net/SFTP/Stream.php');
require_once('rabbitMQLib.inc');
define('NET_SSH2_LOGGING', NET_SSH2_LOG_COMPLEX);
const ip = [
    'frontend-qa'   => '10.0.142.134',
    'api-qa'        => '10.0.136.105',
    'db-qa'         => '10.0.29.54',
    'frontend-live' => '10.0.142.19',
    'api-live'      => '10.0.187.245',
    'db-live'       => '10.0.222.57',
    'db-dev'        => '192.168.1.124',
    'frontend-dev'  => '192.168.1.140',
    'api-dev'       => '192.168.1.199'
];
function log_api_data($rid, $rUser, $accountCreationDate, $verified)
{
    $db = mysqli_connect('localhost', 'emile', 'Password7!', 'authtest');
    $rUser = mysqli_real_escape_string($db, $rUser);
    $s = "SELECT * FROM reddit_data WHERE redditorID ='". $rid ."';";
    echo $s;
    ($t = mysqli_query($db, $s) or die(mysqli_errno($db)));
    $num = mysqli_num_rows($t);
    $result = false;
    echo $num;
    if ($num == 1) {
        echo "already exists";
        $result = true;
    } else {
        $s = "INSERT INTO reddit_data VALUES('".$rid."', '".$rUser."', CAST('". $accountCreationDate ."' AS DATE), '".$verified."');";
        $t = (mysqli_query($db, $s));
        echo $result;
    }
    //echo $result;
    return $result;
}
function bundle($layer, $target, $version)
{
    //Initialize SSH connection to target@layer
    $host = $target . '-' . $layer;
    $ssh = new Net_SSH2(ip[$host]);
    $key = new Crypt_RSA();
    $key->loadKey(file_get_contents('keys/'.$host . '.pem'));
    echo 'attempting connection';
    if (!$ssh->login('ubuntu', $key)) {
        exit('Login Failed');
    }
    
    //SSH commands
    $ssh->setTimeout(6);
    $read = 'ubuntu@ip-' . str_replace('.', '-', ip[$host]) . ':~$';
    echo $ssh->read($read);
    $ssh->write("tar -cvzf ". $version . ".tar.gz git/" . $target . "/\n");     //Compress current directory to ver.tar.gz
    echo $ssh->read($read);
    $ssh->write("scp -i deploy.pem " . $version . '.tar.gz ubuntu@10.0.239.193:~/deploy/bundles/' . $target . '' . "\n");   //SCP ver.tar.gz to deploy server
    echo $ssh->read($read);
    //Close SSH connection
    $ssh->disconnect();	   
    unset($ssh);
    return true;
}
function push($host, $layer, $version)
{
    $bundle = $version . '.tar.gz';
    $key_file = $host . '-' . $layer;
    $read = 'ubuntu@ip-' . str_replace('.', '-', ip[$key_file]) . ':~$';
    
    //Initialize SSH connection to target@layer
    $ssh = new Net_SSH2(ip[$key_file]);
    $key = new Crypt_RSA();
    $key->loadKey(file_get_contents('keys/'.$key_file . '.pem'));
    echo "attempting SSH connection to " . $key_file . "\n";
    if (!$ssh->login('ubuntu', $key)) {
        exit('Login Failed');
    }
    
    //Initialize SFTP/SCP connection to target@layer
    $sftp = new Net_SFTP(ip[$key_file]);
    $key = new Crypt_RSA();
    $key->loadKey(file_get_contents('keys/'.$key_file . '.pem'));
    echo "attempting SFTP/SCP connection to " . $key_file . "\n";
    if (!$sftp->login('ubuntu', $key)) {
        exit('Login Failed');
    }
    //Attempt to SCP bundle.tar.gz to target@layer
    $scp = new Net_SCP($ssh);
    if (!$scp->put(
        '/home/ubuntu/bundles/' . $bundle,
                   '/home/ubuntu/deploy/bundles/' . $host . '/' . $bundle,
                   NET_SCP_LOCAL_FILE
    )) {
        throw new Exception('Failed to transfer file.');
    }
    
    //SSH Commands
    $ssh->setTimeout(6);
    echo $ssh->read($read);
    $ssh-> write('tar -cvzf ' . $host . '_old.tar.gz git/' . $host . "/\n");    //Compress locally installed version to *_old.tar.gz backup
    echo $ssh->read($read);
    $ssh-> write('tar -C git/' . $host . ' -xzvf bundles/' . $bundle . "\n");   //Extract new version
    echo $ssh->read($read);
    //Close SSH connection
    $ssh->disconnect();
    unset($scp);
    unset($ssh);
    //echo "\nPush " . $bundle . " to " . $key_file . " complete. \n";
    return true;
}
function rollback($layer, $host)
{
    $bundle = $layer . '_old.tar.gz';
    $key_file = $layer . '-' . $host;
    $read = 'ubuntu@ip-' . str_replace('.', '-', ip[$key_file]) . ':~$';
    
    //Initialize SSH connection to target@layer
    $ssh = new Net_SSH2(ip[$key_file]);
    $key = new Crypt_RSA();
    $key->loadKey(file_get_contents('keys/'.$key_file . '.pem'));
    echo "attempting connection\n";
    if (!$ssh->login('ubuntu', $key)) {
        exit('Login Failed');
    }
    $ssh->setTimeout(6);
    echo $ssh->read($read);
    $ssh-> write('tar -C git/' . $layer . ' -xzvf ' . $bundle . "\n");
    echo $ssh->read($read);
    //echo "\nRollback " . $bundle . " to " . $key_file . " complete. \n";
    $ssh->disconnect(); 
    unset($ssh);
    return true;
}
function startsWith($haystack, $needle)
{
    $length = strlen($needle);
    return (substr($haystack, 0, $length) === $needle);
}
function endsWith($haystack, $needle)
{
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }
    return (substr($haystack, -$length) === $needle);
}
?>
