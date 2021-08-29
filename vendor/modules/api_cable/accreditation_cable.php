<?php
use Api\Mutation\APIRegister;
use Modules\Utils\PasswordGenerator;
if(isset($_POST['accreditation_save'])){
    $api_reg=new APIRegister();
    $username=$_POST['username'];
    $first_name=$_POST['first_name'];
    $middle_name=$_POST['middle_name'];
    $last_name=$_POST['last_name'];
    $contact_no=$_POST['contact_number'];
    $email_address=$_POST['email_address'];
    $affiliate_level=intval($_POST['affiliate_level']);
    $arr=array();
    if(!$username){
        $arr['status']='failed';
        $arr['message']='Please input username';
    }else if(!$first_name){
        $arr['status']='failed';
        $arr['message']='Please input first name';

    }else if(!$last_name){
        $arr['status']='failed';
        $arr['message']="Plase input last name";
    }
    else if(!$contact_no){
        $arr['status']='failed';
        $arr['message']="Please input contact number";

    }else if(!$email_address){
        $arr['status']='failed';
        $arr['message']='Please input email address';
    }else if(!$affiliate_level){
        $arr['status']='failed';
        $arr['message']='Missing affiliate level';
    }else if($affiliate_level == -1){
        $arr['status']='failed';
        $arr['message']='Invalid affiliate level';
    }else{
        $pass=new PasswordGenerator();
        $api_reg->username=$username;
        $api_reg->last_name=$last_name;
        $api_reg->first_name=$first_name;
        $api_reg->middle_name=$middle_name;
        $api_reg->contact_number=$contact_no;
        $api_reg->email_address=$email_address;
        $api_reg->is_accreditation=true;
        $api_reg->affiliate_level=$affiliate_level;
        $api_reg->password=$pass->generate(8);
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