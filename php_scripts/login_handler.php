<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$uname = $request->uname;
$pass = $request->pass;

//$conn = new mysqli("localhost", "root", "", "ost");
include './db_connector.php';

$result = $conn->query("SELECT * FROM user_details where uname='".$uname."' and password='".$pass."'");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"uname":"'  . $rs["uname"] . '",';
    $outp .= '"pass":"'. $rs["password"]     . '"}'; 
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>
