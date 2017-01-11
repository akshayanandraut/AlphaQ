<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$uname = $request->uname;
$name = $request->name;
$email = $request->email;
$city = $request->city;
$pass = $request->pass;

//$conn = new mysqli("localhost", "root", "", "ost");
include './db_connector.php';

$result = $conn->query("INSERT INTO user_details (uname,name,email,city,password) VALUES('".$uname."','".$name."','".$email."','".$city."','".$pass."')");
?>
