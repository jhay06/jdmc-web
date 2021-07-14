<?php
use Api\Mutation\APIRegister;

if(isset($_POST['accreditation_save'])){
    $api_reg=new APIRegister();
    $api_reg->username=$_POST['username'];
    $api_reg->last_name=$_POST['last_name'];
    $api_reg->first_name=$_POST['first_name'];
    $api_reg->middle_name=$_POST['middle_name'];
    $api_reg->contact_number=$_POST['contact_number'];
    $api_reg->email_address=$_POST['email_address'];
    $api_reg->is_accreditation=true;
    $api_reg->affiliate_level=intval($_POST['affiliate_level']);
    $res=$api_reg->process();
    
    if($api_reg->is_error()==false){
        header("Location: /accreditation");
    }
}

include("templates/members/accreditation-new.html");
?>