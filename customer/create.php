<?php
header('Access-Control-Allow-Origin:*');
header('Content-type: application/json');
header('Access-Control-Allow-Method:POST');
header('Access-Control-Allow-Header:Content-Type, Access-Control-Allow-Header, Authorization, X-Request-With');

include('function.php');

$requestMethod=$_SERVER["REQUEST_METHOD"];
if($requestMethod == 'POST'){
    $inputData= json_decode(file_get_contents("php://input"), true);
    if(empty($inputData)){
        $storeCustomer= storeCustomer($_POST);
        
    }else{
        $storeCustomer= storeCustomer($inputData);
        
        }
        echo $storeCustomer;
        
}else{
    $data=[
        'status'=> 405,
        'message'=> $requestMethod.'Method not Allowed',
    ];
    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($data);
}

?>