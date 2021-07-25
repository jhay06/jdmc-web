<?php
if(!isset($_SESSION['username']) || !isset($_SESSION['login_hash'])){
    header('Location: /');
}else{
    $current_user=$GLOBALS['_user'];
    
    if($current_user->is_temporary_password){
       if($GLOBALS['_location'] !='/settings'){
           
           header('location: /settings');
       }
    }  
    

}

?>