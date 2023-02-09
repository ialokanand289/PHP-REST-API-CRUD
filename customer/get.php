
<?php
header('Access-Control-Allow-Origin:*');
header('Content-type: application/json');
header('Access-Control-Allow-Method:GET');
header('Access-Control-Allow-Header:Content-Type, Access-Control-Allow-Header, Authorization, X-Request-With');

include('function.php');

$requestMethod= $_SERVER["REQUEST_METHOD"];
    if($requestMethod == "GET"){
        if(isset($_GET['id'])){
            $customer= getCustomer($_GET);
            echo $customer;

    }else{
    $customerList= getCustomerList();
    echo $customerList;
    }
}
else
{
    $data=[
        'status'=> 405,
        'message'=> $requestMethod.'Method not Allowed',
    ];
    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($data);
}

?>