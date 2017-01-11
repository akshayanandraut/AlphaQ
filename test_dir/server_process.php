<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$uname1 = $request->uname;
$email1 = $request->email;

$conn = new mysqli("localhost", "root", "", "test");

$result = $conn->query("SELECT * FROM server_check where uname='".$uname1."' and email='".$email1."'");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"Uname":"'  . $rs["uname"] . '",';
    $outp .= '"Email":"'. $rs["email"]     . '"}'; 
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>
