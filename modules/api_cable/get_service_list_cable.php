<?php
    use API\Query\APIGetServices;
    if(isset($_POST['get_services'])){
        $api=new APIGetServices();
    
        $var = $api->process();
        $args=array();
        if($api->is_error()){
            $args['status']='error';
            $args['message']='Unknown error, Please try again';
            $args['data']=$var;
        }else{
            $res= $api->get_result();
            $args['status']= $res['type'];
            $args['message']= $res['message'];
            $args['data']=$res['data'];
    
        }
        print json_encode($args);
    }else{
        http_response_code(404);
    }
   
?>