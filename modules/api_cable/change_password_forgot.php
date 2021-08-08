<?php
    use API\Mutation\APIChangePasswordViaForgot;
    if(isset($_POST['change_password'])){
        $email_address=$_POST['email_address'];
        $new_password=$_POST['new_password'];
        $username=$_POST['username'];
        $reset_key=$_POST['reset_key'];

        $api=new APIChangePasswordViaForgot();
        $api->email_address=$email_address;
        $api->reset_key=$reset_key;
        $api->username=$username;
        $api->new_password=$new_password;
        $var= $api->process();
        $arr=array();
    
        if($api->is_error()){
            $arr['status']='error';
            $arr['message']='Unknown error, Please trye again later';
        }else{
            $res=$api->get_result();
            $arr['status']=$res['type'];
            $arr['message']=$res['message'];
        }
        print json_encode($arr);

    }else{
        http_response_code(404);
        exit;
    }

?>