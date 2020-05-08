<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
//var_dump($_GET['id_devi']);
$id_devi=isset($_GET['id_devi']) ? $_GET['id_devi']:die();
$v=isset($_GET['value']) ? $_GET['value']:die();
if($id_devi !=null)
{
    $arr=explode("-",$id_devi);
}

include_once "phpMQTT.php";
$server = "philongit.ddns.net";     // change if necessary
$port = 1883;                     // change if necessarypo
$username = "philong";                   // set your username
$password = "123456";                   // set your password
$client_id = "Webservice"; // make sure this is unique for connecting to sever - you could use uniqid()
$mqtt = new  Bluerhinos\phpMQTT($server, $port, $client_id);
if ($mqtt->connect(true, NULL, $username, $password))
{

    $mqtt->publish($arr[0],$arr[1].'/'.$v, 0);
    $mqtt->close();
}
else {
    echo "Time out!\n";
}
?>
