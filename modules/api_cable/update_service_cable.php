<?php
use API\Mutation\APIUpdateService;
include_once("controller/session_check.php");
if(isset($_POST['update_service'])){
    $modified_by=$current_user->username;
    $service_id=intval($_POST['service_id']);
    $upload_new_file=$_POST['upload_new_file'] ==="true"?true:false;
    $product_code=$_POST['product_code'];
    $product_name=$_POST['product_name'];
    $class_id=intval($_POST['class_id']);
    $product_description=$_POST['product_description'];
    $image_file=$_POST['image_file'];
    $args=array();
    if(!isset($modified_by)){
        $args['status']='failed';
        $args['message']='Unable to process the request, Please refresh your browser';

    }else if($service_id == 0){
        $args['status']='failed';
        $args['message']='Unknown service';
    }else if(!isset($product_code)){
        $args['status']='failed';
        $args['message']='Product code is required';
    }else if(!isset($product_name)){
        $args['status']='failed';
        $args['message']="Product name is required";
    }else if($class_id == 0){
        $args['status']='failed';
        $args['message']='Product Classification is required';

    }else if(!isset($product_description)){
        $args['status']='failed';
        $args['message']='Product Description is required';
    }else if(!isset($image_file)){
        $args['status']='failed';
        $args['message']='Unknown error from the image file';
    }else{
        $api=new APIUpdateService();
        $api->service_id=$service_id;
        $api->upload_new_file=$upload_new_file;
        $api->product_code=$product_code;
        $api->product_name=$product_name;
        $api->class_id=$class_id;
        $api->product_description=$product_description;
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