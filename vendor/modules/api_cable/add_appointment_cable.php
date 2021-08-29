<?php
use Api\Mutation\APIAddAppointment;

if(isset($_POST['add_appointment'])){
    $patient_name=$_POST['patient_name'];
    $patient_contact_no=$_POST['patient_contact_no'];
    $email_address=$_POST['email_address'];
    $branch_code=$_POST['branch_code'];
    $branch_name=$_POST['branch_name'];
    $appointment_date=$_POST['appointment_date'];
    $start_timeslot=$_POST['start_timeslot'];
    $end_timeslot=$_POST['end_timeslot'];
    $appoint_by=$_SESSION['username'];
    $arr=array();
    if(!$appoint_by){
        $arr['status']='failed';
        $arr['message']='Unable to add appointment, Please refresh the browser';
    }else
    if(!$patient_name){
        $arr['status']='failed';
        $arr['message']='Please type patient name';
    }else if(!$patient_contact_no){
        $arr['status']='failed';
        $arr['message']='Please type patient contact number';
    }else if(!$email_address){
        $arr['status']='failed';
        $arr['message']='Please type patient email address';
    }else if(!$branch_code || !$branch_name){
        $arr['status']='failed';
        $arr['message']='Please choose branch';
    }else if(!$start_timeslot){
        $arr['status']='failed';
        $arr['message']='Please choose start time slot';
    }else if(!$end_timeslot){
        $arr['status']='failed';
        $arr['message']='Please choose end time slot';
    }else{
        $api=new APIAddAppointment();
        $api->patient_name=$patient_name;
        $api->patient_contact_no=$patient_contact_no;
        $api->email_address=$email_address;
        $api->branch_code=$branch_code;
        $api->branch_name=$branch_name;
        $api->appointment_date=$appointment_date;
        $api->start_timeslot=$start_timeslot;
        $api->end_timeslot=$end_timeslot;
        $api->appoint_by=$appoint_by;
        $var=$api->process();
        if($api->is_error()){
            $arr['status']='error';
            $arr['message']='Unknown error, Please try again later';
            $arr['data']=$var;
        }else{
            $res=$api->get_result();
            $arr['status']=$res['type'];
            $arr['message']=$res['message'];
            $arr['data']=$res['data'];
        }



    }
    print json_encode($arr);
}

?>