<?php
    use API\Mutation\APIAddPromotion;
    include_once("controller/session_check.php");
    if(isset($_POST['add_promotion'])){
        $profile_id=$current_user->profile_id;
        if($profile_id !=1){
            http_response_code(404);
            exit;
        }
   
        $created_by=$current_user->username;
        
        $promotion_name=$_POST['promotion_name'];
        $promotion_status=intval($_POST['promotion_status']);
        $current_status = null;
        if($promotion_status == 1){
            $current_status= 'Active';
        }else if($promotion_status == 2){
            $current_status= 'Inactive';
        }
        else{
            $args['status']='failed';
            $args['message']='Invalid status';
            echo json_encode($args);
            exit;
        }
        $promotion_description=$_POST['promotion_description'];
        $image_file=$_POST['image_file'];
       
        $args=array();
     
        if(!isset($promotion_name)){
            $args['status']='failed';
            $args['message']='Promotion name is required';

        
        }else if(!$promotion_description){
            $args['status']='failed';
            $args['message']='Promotion description is required';
        }else if(!$image_file){
            $args['message']='Image file is required';
            $args['status']='failed';
        }else{
            $api=new APIAddPromotion();
            $api->promotion_name=$promotion_name;   
            $api->status = $current_status;
            $api->description = $promotion_description;
            $api->image_file=$image_file;
            $api->created_by=$created_by;
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