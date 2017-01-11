<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$user_name = $request->user_name;


//$quiz_id = 1;

//$conn = new mysqli("localhost", "root", "", "ost");
include './db_connector.php';

//$result = $conn->query("select * from quiz where uname!='".$username."'");
$result = $conn->query("SELECT qu.qname,q.uname,q.qscore from quiz_score q join quiz qu on q.qid=qu.qid where q.uname='".$user_name."'");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"uname":"'.$rs["uname"].'",';
    $outp .= '"qname":"'.$rs["qname"].'",';
    $outp .= '"qscore":"'.$rs["qscore"].'"}'; 
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>
