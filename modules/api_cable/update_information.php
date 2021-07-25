<?php
use Modules\Constants\ProfileLevel;
use Api\Mutation\APIUpdateAccount;
if(isset($_POST['reg']) || isset($_POST['accreditation_save'])){
    $old_username=$_POST['old_username'];
    $employee_no=null;
    $old_employee_no=null;
    if(isset($_POST['old_employee_no'])){
        $old_employee_no=$_POST['old_employee_no'];

    }
    $username=$_POST['username'];
    if(isset($_POST['employee_no'])){

        $employee_no=$_POST['employee_no'];
    }
    $first_name=$_POST['first_name'];
    $middle_name=$_POST['middle_name'];
    $last_name=$_POST['last_name'];
    $affiliate_level=0;
    if(isset($_POST['affiliate_level'])){
        $affiliate_level=intval($_POST['affiliate_level']);
    }
    $email_address=null;
    $suffix=null;
    $date_registered=$_POST['date_registered'];
    $contact_no=null;

    if(isset($_POST['contact_number'])){

         $contact_no=$_POST['contact_number'];
    }
    if(isset($_POST['email_address'])){

        $email_address=$_POST['email_address'];
    }
    $is_activated=$_POST['is_activated']===1?true:false;
    if(isset($_POST['suffix'])){
        $suffix=$_POST['suffix'];
    }

    $level=$_POST['level'];
    if(isset($level)){
        $arr=array();
        $err=false;
        if(!$username){
            $err=true;
            $arr['status']='failed';
            $arr['message']='Please input username';
        }else if(!$first_name){
            $err=true;
            $arr['status']='failed';
            $arr['message']='Please input first name';
        }else if(!$last_name){
            $err=true;
            $arr['status']='failed';
            $arr['message']='Please input last name';
        }else if(!$email_address){
            $err=true;
            $arr['status']='failed';
            $arr['message']='Please input email address';
        }

        if($level=='staff'){
            $profile_id=ProfileLevel::Staff;
            if(!$employee_no){
                $err=true;
                $arr['status']='failed';
                $arr['message']='Please input employee number';
            }
            
        }else if($level=="dentist"){
            $profile_id=ProfileLevel::Dentist;
            if(!$contact_no){
                $err=true;
                $arr['status']='failed';
                $arr['message']='Please input contact number';
            }else if($affiliate_level==0){
                $err=true;
                $arr['status']='failed';
                $arr['message']='Please select affiliate level';
            }
        }else if($level=="su"){
            $profile_id=ProfileLevel::Superuser;
        }else{
            $err=true;
            $arr['status']='failed';
            $arr['message']='Invalid request';
        }
        if($err){
            echo json_encode($arr);
        }else{
            $update_api=new APIUpdateAccount();
            $update_api->username=$old_username;
            $update_api->new_username=$username;
            $update_api->employee_no=$old_employee_no;
            $update_api->new_employee_no=$employee_no;
            $update_api->first_name=$first_name;
            $update_api->middle_name=$middle_name;
            $update_api->last_name=$last_name;
            $update_api->suffix=null;
            $update_api->profile_id=$profile_id;
            $update_api->affiliate_level_id=$affiliate_level;
            $update_api->email_address=$email_address;
            $update_api->contact_no=$contact_no;
            $update_api->is_activated=$is_activated;
            $update_api->date_registered=$date_registered;
            //print_r($update_api);
            $res=$update_api->process();
          //  print_r($res);
            if($update_api->is_error()){
                $arr['status']='error';
                $arr['message']='Unknown error, Please try again';
            }else{
                $result=$update_api->get_result();
                
             
                $arr['status']=$result['type'];
                $arr['message']=$result['message'];
            }
            echo json_encode($arr);
        }

    }else{
        http_response_code(404);
    }
}else{
    http_response_code(404);
}

?>