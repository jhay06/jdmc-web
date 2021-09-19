<?php
use API\Mutation\APISubmitFeedback;

if(isset($_POST['submit_feedback'])){
    $full_name=$_POST['full_name'];
    $contact_no=$_POST['contact_no'];
    $email_address=$_POST['email_address'];
    $message=$_POST['message'];
    $args=array();
    if(!isset($full_name)){
        $args['status']='failed';
        $args['message']='Please type your full name';
    }else if(!isset($contact_no)){
        $args['status']='failed';
        $args['message']='Please type your contact number';

    }else if(!isset($email_address)){
        $args['status']='failed';
        $args['message']='Please type your email address';

    }else if(!isset($message)){
        $args['status']='failed';
        $args['message']='Please type your message';

    }else{
        $api=new APISubmitFeedback();
        $api->full_name=$full_name;
        $api->contact_no=$contact_no;
        $api->email_address=$email_address;
        $api->message=$message;
        $var = $api->process();
        if($api->is_error()){
            $args['status']='error';
            $args['message']="Unknown error, Please try again";
        }else{
            $res=$api->get_result();
            $args['status']=$res['type'];
            $args['message']=$res['message'];
        }
        

    }
    print json_encode($args);
}

?>