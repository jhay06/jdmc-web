<?php
include_once("controller/session_check.php");
$current_user=$GLOBALS['_user'];
if($current_user->profile_id ==3){
    http_response_code(404);
    exit;
}  

use Api\Query\APIGetUserInfo;
$username=null;
$contact_no=null;
$first_name=null;
$middle_name=null;
$last_name=null;
$suffix=null;
$email_address=null;
$profile_id=-1;
$affiliate_level_id=-1;
$is_activated=false;
$date_registered=null;
$is_updating=false;
if(isset($_POST['accreditation_ok'])){
    $accreditation_ok=$_POST['accreditation_ok']==='true'?true:false;
    
    if($accreditation_ok){
        header('HTTP/1.1 307 Temporary Redirect');
        header("Location: /accreditation");
        
    }
}
if(isset($_GET['action'])){
    if(isset($_GET['user'])){
        $user_info=new APIGetUserInfo();
        $user_info->username=$_GET['user'];
        $res=$user_info->process();
        if($user_info->is_error()){
            http_response_code(404);
            exit;
        }else{
            $user_details=$user_info->get_result()['data'];
      
            $username=$user_details['username'];
            $contact_no=$user_details['contact_number'];
           
            $first_name=$user_details['first_name'];
            $middle_name=$user_details['middle_name'];
            $last_name=$user_details['last_name'];
            $email_address=$user_details['email_address'];
            $profile_id=$user_details['profile_id'];
            $affiliate_level_id=$user_details['affiliate_level_id'];
            $is_activated=$user_details['is_activated'];
            $date_registered=$user_details['date_registered'];
            $is_updating=true;
            if($profile_id != 3){
                http_response_code(404);
                exit;

            }
        }
    }else{
        http_response_code(404);
        exit;
    }
}

include("templates/members/accreditation-new.html");
?>