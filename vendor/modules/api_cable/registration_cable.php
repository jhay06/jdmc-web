<?php
use Api\Mutation\APIRegister;
use Modules\Utils\PasswordGenerator;
if(isset($_POST['reg'])){
    $api_reg=new APIRegister();
    $arr=array();
    $username=$_POST['username'];
    $employee_no=$_POST['employee_no'];
    $first_name=$_POST['first_name'];
    $middle_name=$_POST['middle_name'];
    $last_name=$_POST['last_name'];
    $email_address=$_POST['email_address'];
    if(!isset($_POST['username'])){
        $arr['status']='failed';
        $arr['message']='Please input username';
    }else if(!isset($_POST['employee_no'])){
        $arr['status']='failed';
        $arr['message']='Please input employee number';

    }else if(!isset($_POST['first_name'])){
        $arr['status']='failed';
        $arr['message']='Please input first name';
    }else if(!isset($_POST['last_name'])){
        $arr['status']='failed';
        $arr['message']='Please input last name';
    }else if(!isset($_POST['email_address'])){
        $arr['status']='failed';
        $arr['message']='Please input email address';
    
    }else{
        $pass=new PasswordGenerator();
        $api_reg->username=$_POST['username'];
        $api_reg->employee_no=$_POST['employee_no'];
        $api_reg->first_name=$_POST['first_name'];
        $api_reg->middle_name=$_POST['middle_name'];
        $api_reg->last_name=$_POST['last_name'];
        $api_reg->email_address=$_POST['email_address'];
        $api_reg->password=$pass->generate(8);
        $api_reg->is_accreditation=false;
        $res=$api_reg->process();
        if($api_reg->is_error()==false){
            $result=$api_reg->get_result();
            $arr['status']=$result['type'];
            $arr['message']=$result['message'];
            $arr['password']=$api_reg->password;
        }else{
            $arr['status']='error';
            $arr['message']='Unknown error, Please try again later';
        }
    
    }

    print json_encode($arr);
}else{

    http_response_code(404);
}

?>