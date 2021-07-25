<?php

    use API\Query\APIGetUserInfo;
    include_once("controller/session_check.php");
    $username=$_SESSION['username'];
   
        if(isset($_POST['change_password_ok'])){
            $change_ok=$_POST['change_password_ok']==='true'?true:false;
            if($change_ok){
                $api_user=new APIGetUserInfo();
                $api_user->username=$username;
                $api_user->process();
                $err=false;
                $msg=null;
                if($api_user->is_error()){
                    $err=true;
                    $msg="Unknown error, Please try again";   
                }else{
                    $res=$api_user->get_result();
                    if($res['type'] !='success'){
                        $err=true;
                        $msg=$res['message'];
                    }else{
                        $info_string=json_encode($res['data']);
                     
                        $_SESSION['login_hash']=base64_encode($info_string);
                        $msg='Password updated!';
                        $GLOBALS['_user']=json_decode(base64_decode($_SESSION['login_hash']));
                    }
                }
            }


        }
    include_once("templates/members/settings.html");
?>