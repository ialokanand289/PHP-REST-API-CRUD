
<?php

// use LDAP\Result;

require_once'../core/config.php';
function getCustomerList(){
    global $conn;

    $sql=" SELECT * FROM student" ;
    $result= mysqli_query($conn,$sql);
    if($result){
        if(mysqli_num_rows($result) > 0){
            $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
            $data=[
                'status'=> 200,
                'message'=>'Customer List Fetched Successfully.',
                'data' => $result
            ];
            header("HTTP/1.0 200 OK ");
            return json_encode($data);
        }else{
            $data=[
                'status'=> 404,
                'message'=>'Customer Not Found',
            ];
            header("HTTP/1.0 404 Customer Not Found");
            return json_encode($data);
        }

    }else{
        $data=[
            'status'=> 500,
            'message'=>'Internal Server Error',
        ];
        header("HTTP/1.0 500 Internal Server Error");
        return json_encode($data);
    }
}



?>