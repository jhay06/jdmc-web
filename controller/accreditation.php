<?php

use Api\Query\APIGetUserList;
use Modules\Constants\AffiliateLevel;


$api_list=new APIGetUserList();

$api_list->profile_id=3;
$res=$api_list->process();
if($res !=null){
   if($api_list->is_error()==false){
      $user_list=$api_list->get_result()['users'];
   }
}

include("templates/members/accreditation.html");
?>