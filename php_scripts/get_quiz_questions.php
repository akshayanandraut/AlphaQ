<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$quiz_id = $request->quiz_id;


//$quiz_id = 1;

//$conn = new mysqli("localhost", "root", "", "ost");
include './db_connector.php';

//$result = $conn->query("select * from quiz where uname!='".$username."'");
$result = $conn->query("SELECT q.quesid,q.ques_name,q.op1,q.op2,q.op3,q.op4,q.correct_op FROM ques q JOIN quiz_ques qu on q.quesid=qu.quesid WHERE qu.qid=".$quiz_id);

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"ques_id":"'.$rs["quesid"].'",';
    $outp .= '"ques_name":"'.$rs["ques_name"].'",';
    $outp .= '"correct_op":"'.$rs["correct_op"].'",';
    $outp .= '"op1":"'.$rs["op1"].'",';
    $outp .= '"op2":"'.$rs["op2"].'",';
    $outp .= '"op3":"'.$rs["op3"].'",';
    $outp .= '"op4":"'.$rs["op4"].'"}'; 
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>
