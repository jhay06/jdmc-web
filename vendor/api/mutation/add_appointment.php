<?php
namespace Api\Mutation;

use Api\Inputs\BaseInput;

class APIAddAppointment extends BaseInput{
    public $patient_name;
    public $patient_contact_no;
    public $email_address;
    public $branch_code;
    public $branch_name;
    public $appointment_date;
    public $start_timeslot;
    public $end_timeslot;
    public $appoint_by;
    
    function __construct(){
        parent::__construct("add_appointment");
    }
}

?>