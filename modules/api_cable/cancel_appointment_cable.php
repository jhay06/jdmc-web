<?php
use API\Mutation\APICancelAppointment;

if(isset($_POST['cancel_appointment'])){
    $reference_codes=$_POST['reference_codes'];
    $cancelled_by=$_SESSION['username'];
    $args=array();
    if(!isset($cancelled_by)){
        $args['status']='failed';
        $args['message']='Request cannot be processed, please refresh your browser and then try again';

    }else if(!isset($reference_codes)){
        $args['status']='failed';
        $args['message']='Please add an item';
    }else{
        $api=new APICancelAppointment();
        $api->reference_codes=$reference_codes;
        $api->cancelled_by=$cancelled_by;
        $var=$api->process();
        if($api->is_error()){
            $args['status']='error';
            $args['message']='Unknown error, Please try again';
            $args['data']=$var;
        }else{
            $res=$api->get_result();
            $args['status']=$res['type'];
            $args['message']=$res['message'];
        }
    }

    print json_encode($args);

}


?>