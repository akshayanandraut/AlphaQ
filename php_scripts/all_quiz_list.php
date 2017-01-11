<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$username = $request->username;


//$user_name = 'sid1';

//$conn = new mysqli("localhost", "root", "", "ost");
include './db_connector.php';

//$result = $conn->query("select * from quiz where uname!='".$username."'");
$result = $conn->query("SELECT q.qid,q.qname,q.uname,q.marks,q.time,count(qu.quesid) as num_of_ques FROM quiz q JOIN quiz_ques qu on q.qid=qu.qid WHERE uname!='".$username."' and q.qid not in (select qid from quiz_score WHERE uname='".$username."') GROUP by q.qid");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"qid":"'.$rs["qid"].'",';
    $outp .= '"qname":"'.$rs["qname"].'",';
    $outp .= '"uname":"'.$rs["uname"].'",';
    $outp .= '"num_of_ques":"'.$rs["num_of_ques"].'",';
    $outp .= '"marks":"'.$rs["marks"].'",';
    $outp .= '"time":"'.$rs["time"].'"}'; 
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>
