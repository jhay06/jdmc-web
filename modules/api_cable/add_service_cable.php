<?php
    use API\Mutation\APIAddService;
    include_once("controller/session_check.php");
    if(isset($_POST['add_service'])){
        $profile_id=$current_user->profile_id;
        if($profile_id !=1){
            http_response_code(404);
            exit;
        }
   
        $created_by=$current_user->username;
        $product_code=$_POST['product_code'];
        $product_name=$_POST['product_name'];
        $class_id=intval($_POST['class_id']);
        $product_description=$_POST['product_description'];
        $image_file=$_POST['image_file'];
       
        $args=array();
        if(!isset($product_code)){
            $args['status']='failed';
            $args['message']='Product code is required';
        }else if(!isset($product_name)){
            $args['status']='failed';
            $args['message']='Product name is required';

        }else if($class_id == 0){
            $args['status']='failed';
            $args['message']='Product class is required';
        }else if(!$product_description){
            $args['status']='failed';
            $args['message']='Product description is required';
        }else if(!$image_file){
            $args['message']='Image file is required';
            $args['status']='failed';
        }else{
            $api=new APIAddService();
            $api->product_code=$product_code;
            $api->product_name=$product_name;
            $api->class_id=$class_id;
            $api->product_description=$product_description;
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