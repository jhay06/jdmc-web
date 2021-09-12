<?php
use API\Query\APIGetProductByProductCode;
$product_code="";
$product_name="";
$product_class_id=0;
$product_description="";
$product_image="";
$service_id=0;
if(isset($_GET['product'])){
   
    $product_code=$_GET['product'];
    
    $api=new APIGetProductByProductCode();
    $api->product_code=$product_code;
    $var=$api->process();

    if($api->is_error()==false){
        $res=$api->get_result();
        if($res['type'] == 'success'){
            $data=$res['data'];
            $service_id=$data['service_id'] !==null?$data['service_id']:"";
            $product_name=$data['product_name'] !==null?$data['product_name']:"";
            $product_class_id=$data['class_id'];
            $product_description=$data['product_description'];
            $product_image=$data['file_name'];
        }   
      
    }
}

?>