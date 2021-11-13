<?php
include_once("controller/session_check.php");
$current_user=$GLOBALS['_user'];
if($current_user->profile_id !=1){
    http_response_code(404);
    exit;
}  
include_once("templates/members/promotion.html");
?>