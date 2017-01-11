<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$quiz_id = $request->quiz_id;
$ques_name = $request->ques_name;
$op1 = $request->op1;
$op2 = $request->op2;
$op3 = $request->op3;
$op4 = $request->op4;
$correct_op = $request->correct_op;

//$conn = new mysqli("localhost", "root", "", "ost");
include './db_connector.php';

$result = $conn->query("select quesadder('".$ques_name."','".$op1."','".$op2."','".$op3."','".$op4."',".$correct_op.") as quesid");

$ques_id = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    $ques_id = $rs["quesid"];
}

$result1 = $conn->query("insert into quiz_ques(qid,quesid) values(".$quiz_id.",".$ques_id.")");

$conn->close();

$outp = "";
$outp ='{"records":['.$outp.']}';
echo($outp);

?>
