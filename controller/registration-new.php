<?php
    use Api\Mutation\APIRegister;
    if(isset($_POST['reg'])){
        $api_reg=new APIRegister();
        
        $api_reg->username=$_POST['username'];
        $api_reg->employee_no=$_POST['employee_no'];
        $api_reg->first_name=$_POST['first_name'];
        $api_reg->middle_name=$_POST['middle_name'];
        $api_reg->last_name=$_POST['last_name'];
        $api_reg->is_accreditation=false;
        $res=$api_reg->process();
        if($api_reg->is_error()==false){
            
            header("Location: /registration");
        }
    }
    include_once("templates/members/registration-new.html");
?>