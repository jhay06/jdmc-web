<?php
use API\Mutation\APIForgotPassword;

if(isset($_POST['forgot_password'])){
    $email_address=$_POST['email_address'];
    $arr=array();

    if(!isset($email_address)){
        $arr['status']='failed';

        $arr['message']='Please input your email address';
    }else{
        $forgot_password=new APIForgotPassword();
        $forgot_password->email_address=$email_address;
        $res=$forgot_password->process();
        if($forgot_password->is_error()){
            $arr['status']='error';
            $arr['message']='Unknown error, Please try again';
            $arr['data']=$res;
        }else{
            $res=$forgot_password->get_result();
            $arr['status']=$res['type'];
            $arr['message']=$res['message'];
        }
    }
    echo json_encode($arr);
   
}else{
    http_response_code(404);
}

?>