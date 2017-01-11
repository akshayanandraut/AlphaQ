<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$quiz_id = $request->quiz_id;
$user_name = $request->user_name;
$quiz_score = $request->quiz_score;


//$user_name = 'sid1';

//$conn = new mysqli("localhost", "root", "", "ost");
include './db_connector.php';

//$result = $conn->query("select * from quiz where uname!='".$username."'");
$result = $conn->query("SELECT score_updater(".$quiz_id.",'".$user_name."',".$quiz_score.")");

$outp = "";
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>
