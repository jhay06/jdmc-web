<?php
include_once("controller/session_check.php");
use Api\Query\APIGetUserList;
use Modules\Constants\AffiliateLevel;
$current_user=$GLOBALS['_user'];
if($current_user->profile_id ==3){
    http_response_code(404);
    exit;
}  

$api_list=new APIGetUserList();

$api_list->profile_id=3;
$res=$api_list->process();
if($res !=null){
   if($api_list->is_error()==false){
      $user_list=$api_list->get_result()['data']['users'];
   }
}

include("templates/members/accreditation.html");
?>