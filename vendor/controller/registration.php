<?php
    include_once("controller/session_check.php");
  
    $current_user=$GLOBALS['_user'];
    if($current_user->profile_id !=1){
        http_response_code(404);
        exit;
    }   
    /*
    use Api\Query\APIGetUserList;

    $api_list=new APIGetUserList();
    $api_list->profile_id=2;
    $res=$api_list->process();
    if($api_list->is_error()==false){
        $user_list=$api_list->get_result()['data']['users'];
    }

    */
    include_once("templates/members/registration.html");
    
?>