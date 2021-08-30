<?php
use Api\Query\APIGetActiveAppointmentByUsername;


if(isset($_POST['get_active_appointment'])){
    $username=$_SESSION['username'];
    $branch_code=$_POST['branch_code'];
    $arr=array();
    if(!isset($username)){
        $arr['status']='failed';
        $arr['message']='Unable to get appointment, Please refresh your browser';
    }else
    if(!isset($branch_code)){
        $arr['status']='failed';
        $arr['message']='Please choose branch';
    }else{
        $api=new APIGetActiveAppointmentByUsername();
        $api->username=$username;
        $api->branch_code=$branch_code;
        $var=$api->process();
        if($api->is_error()){
            $arr['status']='error';
            $arr['message']='Unknown error, Please try again';
            $arr['data']=$var;
        }else{
            $res=$api->get_result();
            $arr['status']=$res['type'];
            $arr['message']=$res['message'];
            $arr['data']=$res['data'];
        }
    }
    print json_encode($arr);
}

?>