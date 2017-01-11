<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//$user_name = 'sid1';

//$conn = new mysqli("localhost", "root", "", "ost");
include './db_connector.php';

//$result = $conn->query("select * from quiz where uname!='".$username."'");
$result = $conn->query("select uname,city,score from user_details ORDER BY score DESC");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"uname":"'.$rs["uname"].'",';
    $outp .= '"city":"'.$rs["city"].'",';
    $outp .= '"score":"'.$rs["score"].'"}'; 
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>
