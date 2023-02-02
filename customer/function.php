
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

function error422($message){
    $data=[
        'status' => 422,
        'message' => $message,
    ];
    header("HTTP/1.0 422 Unprocessable Entity");
    echo json_encode($data);
    exit();

}



function storeCustomer($customerInput){
    global $conn;
    $name= mysqli_real_escape_string($conn,$customerInput['name']);
    $email= mysqli_real_escape_string($conn,$customerInput['email']);
    $phone= mysqli_real_escape_string($conn,$customerInput['phone']);
    if(empty(trim($name))){
        return error422('enter your name:');
    }elseif(empty(trim($email))){
        return error422('enter your email:');
    }elseif(empty(trim($phone))){
        return error422('enter your phone:');
    }else{

        $sql=" INSERT INTO user1 (name, email, phone) VALUES ('$name', '$email', '$phone')";
        $result=mysqli_query($conn,$sql);
        if($result){
            $data=[
                'status'=> 201  ,
                'message'=>'Customer Created Successfully',
            ];
            header("HTTP/1.0 201 Created");
            return json_encode($data);
        }else{
            $data=[
                'status'=> 500,
                'message'=>'Internal Server Error',
            ];
            header("HTTP/1.0 500 Internal Server Error");
            return json_encode($data);
        }
    }
}



?>