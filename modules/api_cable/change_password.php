<?php
use Api\Mutation\APIChangePassword;

if(isset($_POST['change_pass'])){
    $old_password=$_POST['current_password'];
    $new_password=$_POST['new_password'];
    $confirm_password=$_POST['confirm_password'];
    $username=$_POST['username'];
    $arr=array();
    if(!isset($old_password)){
        $arr['status']='failed';
        $arr['message']='Please type your current password';
    }else if(!isset($new_password)){
        $arr['status']='failed';
        $arr['message']='Please type your desire new password';
    }else if(!isset($confirm_password)){
        $arr['status']='failed';
        $arr['message']='Please confirm your password';
    }else if($new_password != $confirm_password){
        $arr['status']='failed';
        $arr['message']='Confirm password does not match to new password';
    }else{
        $change_api=new APIChangePassword();
        $change_api->username=$username;
        $change_api->new_password=$new_password;
        $change_api->old_password=$old_password;
        $change_api->process();
        if($change_api->is_error()){
            $arr['status']='error';
            $arr['message']='Unknown error, Please try again';
        }else{
            $res=$change_api->get_result();
            $arr['status']=$res['type'];
            $arr['message']=$res['message'];
        }
    }
    print json_encode($arr);

}

?>