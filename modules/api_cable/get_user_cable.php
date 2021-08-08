<?php
 include_once("controller/session_check.php");
 use Api\Query\APIGetUserList;

 $current_user=$GLOBALS['_user'];


if(isset($_POST['get_user_list'])){
    $user_type=$_GET['user_type'];
      
    if(isset($user_type)){
       
        $api_list=new APIGetUserList();
        $api_list->profile_id=intval($user_type);
        $res=$api_list->process();
        $arr=array();
        if($api_list->is_error()){
        
            $arr['status']='error';
            $arr['message']='Unknown error, Please try again';
            $arr['data']=$res;
        }else{
            
            $user_list=$api_list->get_result();
            $arr['status']=$user_list['type'];
            $arr['message']=$user_list['message'];
            $arr['data']=$user_list['data'];
        }
        print json_encode($arr);
    }
}else{
    http_response_code(404);
}
 
 
?>