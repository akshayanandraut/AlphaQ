<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$ques_name = $request->ques_name;
$uname = $request->uname;
$marks = $request->marks;
$time = $request->time;

/*$ques_name = 'pp';
$uname = 'sidrai97';
$marks = '5';
$time = '5';
*/

//$conn = new mysqli("localhost", "root", "", "ost");
include './db_connector.php';

$result = $conn->query("select quizadder('".$ques_name."','".$uname."',".$marks.",".$time.") as qid");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"qid":"'  . $rs["qid"] . '"}';
}
$outp ='{"records":['.$outp.']}';

$conn->close();

echo($outp);
?>
