<?php
use API\Mutation\APIUpdateAppointment;
if(isset($_POST['update_appointment'])){
    $modified_by=$_SESSION['username'];
    $reference_code=$_POST['reference_code'];
    $patient_name=$_POST['patient_name'];
    $patient_contact_no=$_POST['patient_contact_no'];
    $email_address=$_POST['email_address'];
    $branch_code=$_POST['branch_code'];
    $branch_name=$_POST['branch_name'];
    $start_timeslot=$_POST['start_timeslot'];
    $end_timeslot=$_POST['end_timeslot'];
    $appointment_date=$_POST['appointment_date'];
    $args=array();
    
    if(!$modified_by){
        $args['status']='failed';
        $args['message']='Unable to process the request, Please refresh the browser and then try again';
    }else
    if(!$reference_code){
       $args['status']='failed';
       $args['message']='Reference code is missing';
    }else if(!$patient_name){
        $args['status']='failed';
       $args['message']='Patient name is required';
    }else if(!$patient_contact_no){
        $args['status']='failed';
        $args['message']='Patient contact number is required';
    }else if(!$email_address){
        $args['status']='failed';
        $args['message']='Email address is required';
    }else if(!$branch_code || !$branch_name){
        $args['status']='failed';
        $args['message']='Branch is required';
    }else if(!$start_timeslot){
        $args['status']='failed';
        $args['message']='Start time is required';
    }else if(!$end_timeslot){
        $args['status']='failed';
        $args['message']='End time is required';
    }else if(!$appointment_date){
        $args['status']='failed';
        $args['message']='Appointment date is required';

    
    }else{
        $api=new APIUpdateAppointment();
        $api->patient_name=$patient_name;
        $api->patient_contact_no=$patient_contact_no;
        $api->reference_code=$reference_code;
        $api->modified_by=$modified_by;
        $api->email_address=$email_address;
        $api->branch_code=$branch_code;
        $api->branch_name=$branch_name;
        $api->start_timeslot=$start_timeslot;
        $api->end_timeslot=$end_timeslot;
        $api->appointment_date=$appointment_date;
        $var=$api->process();
        if($api->is_error()){
            $args['status']='failed';
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
    
}

?>