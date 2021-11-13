<?php
use API\Mutation\APIUpdatePromotion;
include_once("controller/session_check.php");
if(isset($_POST['update_promotion'])){
    $modified_by=$current_user->username;
    $promotion_id=intval($_POST['promotion_id']);
    $image_id = $_POST['image_id'];
    $upload_new_file=$_POST['upload_new_file'] ==="true"?true:false;
 
    $promotion_name=$_POST['promotion_name'];
    $promotion_status=intval($_POST['promotion_status']);
    $current_status = null;
    if($promotion_status == 1){
        $current_status= 'Active';
    }else if($promotion_status == 2){
        $current_status = 'Inactive';
    }else{
        $args['status']='failed';
        $args['message']='Invalid status';
        exit;
    }
    $promotion_description=$_POST['promotion_description'];
    $image_file=$_POST['image_file'];
    $args=array();
    if(!isset($modified_by)){
        $args['status']='failed';
        $args['message']='Unable to process the request, Please refresh your browser';

    }else if($promotion_id == 0){
        $args['status']='failed';
        $args['message']='Unknown promotion';
    }else if(!isset($image_id)){
        $args['status']='failed';
        $args['message']='image id is required';
    }else if(!isset($promotion_name)){
        $args['status']='failed';
        $args['message']="Promotion name is required";
    

    }else if(!isset($promotion_description)){
        $args['status']='failed';
        $args['message']='Promotion Description is required';
    }else if(!isset($image_file)){
        $args['status']='failed';
        $args['message']='Unknown error from the image file';
    }else{
        $api=new APIUpdatePromotion();
        $api->promotion_id = $promotion_id;
        $api->image_id = $image_id;
        $api->upload_new_file=$upload_new_file;
        $api->image_file=$image_file;
        $api->promotion_name=$promotion_name;
        $api->status = $current_status;
        $api->description=$promotion_description;
        $api->image_file=$image_file;
        $api->modified_by=$modified_by;
        $var = $api->process();
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
}else{
    http_response_code(404);
}

?>