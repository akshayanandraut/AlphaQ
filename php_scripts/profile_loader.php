<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$uname = $request->uname;

//$conn = new mysqli("localhost", "root", "", "ost");
include './db_connector.php';

$result = $conn->query("SELECT uname,name,email,city,score FROM user_details where uname='".$uname."'");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"uname":"'.$rs["uname"].'",';
    $outp .= '"name":"'.$rs["name"].'",';
    $outp .= '"email":"'.$rs["email"].'",';
    $outp .= '"city":"'.$rs["city"].'",';
    $outp .= '"score":"'.$rs["score"].'"}'; 
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>
