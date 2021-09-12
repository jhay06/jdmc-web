<?php
use API\Mutation\APIDeleteService;
include_once("controller/session_check.php");
if(isset($_POST['delete_service'])){
    $service_id=intval($_POST['service_id']);
    $deleted_by=$current_user->username;
    $args=array();
    if(!$service_id){
        $args['status']='failed';
        $args['message']='Please select service to delete';
    }else if(!$deleted_by){
        $args['status']='failed';
        $args['message']='Unable to process, Please reload your browser';
    }else{
        $api=new APIDeleteService();
        $api->service_id=$service_id;
        $api->deleted_by=$deleted_by;
        $var = $api->process();
        if($api->is_error()){
            $args['status']='error';
            $args['message']='Unknown error, Please try again';
            $args['data']=$var;
        }else{
            $res=$api->get_result();
            $args['status']=$res['type'];
            $args['message']=$res['message'];
            $args['data']=$res['data'];
        }
    }
    print json_encode($args);
}else{
    http_response_code(404);
}

?>