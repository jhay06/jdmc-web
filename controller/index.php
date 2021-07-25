<?php

use API\Mutation\APILogin;
use API\Response\BaseResponse;
$has_error=false;
if(isset($_POST['login'])){
    $api_login=new APILogin();
    $api_login->username=$_POST['username'];
    $api_login->password=$_POST['password'];
    $var=$api_login->process();
    
    if($api_login->is_error()){
        $has_error=true;
        $error="Unknown error, Please try again later.";

       
    }else{
       
       $res=$api_login->get_result()['data'];
       
       $_SESSION['username']=$res['username'];
       $_SESSION['login_hash']=$res['login_hash'];
        

    }
  
}


if(isset($_SESSION['username']) && isset($_SESSION['login_hash'])){
    header('Location:/dashboard');
}else{
    include_once("templates/global/index.html");

}

?>
