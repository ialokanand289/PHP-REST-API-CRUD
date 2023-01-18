<?php
header("Content-Type: application/json");

$server="localhost";
$username="root";
$password="";
$database="create";

$conn=mysqli_connect($server,$username,$password,$database);
if(!$conn){
    die("error!". mysqli_connect_error());
}




$sql= "SELECT * FROM employee";
$result= mysqli_query($conn,$sql);
$result = $result->fetch_all(MYSQLI_ASSOC);
$apiResult = json_encode($result);
echo ($apiResult)  ;