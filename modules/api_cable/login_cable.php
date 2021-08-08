<?php
use API\Mutation\APILogin;
use API\Response\BaseResponse;
$has_error=false;
$arr=array();
if(isset($_POST['login'])){
    $api_login=new APILogin();


    $api_login->username=$_POST['username'];
    $api_login->password=$_POST['password'];
    
    $var=$api_login->process();

    if($api_login->is_error()){
        $has_error=true;
        $error="Unknown error, Please try again later.";
        $arr['status']='failed';
        $arr['message']=$error; 
        
       
    }else{
       $res=$api_login->get_result();
       if($res['type']=='failed'){
           $arr['status']='failed';
           $arr['message']=$res['message'];
       }else{
            $_SESSION['username']=$res['data']['username'];
            $_SESSION['login_hash']=$res['data']['login_hash'];
            $arr['status']='success';
            $arr['message']='login ok';
 
       }
    


    }


    print json_encode($arr);
}else{
    http_response_code(404);
}



?>
