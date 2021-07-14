<?php
    use Api\Query\APIGetUserList;
    $api_list=new APIGetUserList();
    $api_list->profile_id=2;
    $res=$api_list->process();
    if($api_list->is_error()==false){
        $user_list=$api_list->get_result()['users'];
    }

    include_once("templates/members/registration.html");
    
?>