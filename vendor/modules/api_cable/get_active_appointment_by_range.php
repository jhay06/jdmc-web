<?php
use Api\Query\APIGetActiveAppointmentByRange;


if(isset($_POST['get_active_appointment'])){
    $username=$_SESSION['username'];
    $branch_code=$_POST['branch_code'];
    $from_range=$_POST['from_range'];
    $to_range=$_POST['to_range'];
    $arr=array();
    if(!isset($username)){
        $arr['status']='failed';
        $arr['message']='Unable to get appointment, Please refresh your browser';
    }else
    if(!isset($branch_code)){
        $arr['status']='failed';
        $arr['message']='Please choose branch';
    }else if(!isset($from_range)){
        $arr['status']='failed';
        $arr['message']='Please set start date';
    }else if(!isset($to_range)){
        $arr['status']="failed";
        $arr['message']='Plese set end date';
    
    }else{
        $api=new APIGetActiveAppointmentByRange();
        $api->username=$username;
        $api->branch_code=$branch_code;
        $api->from_range=$from_range;
        $api->to_range=$to_range;
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