<?php
namespace Api\Mutation;

use Api\Inputs\BaseInput;

class APIUpdateAppointment extends BaseInput{
    public $reference_code;
    public $patient_name;
    public $patient_contact_no;
    public $email_address;
    public $branch_code;
    public $branch_name;
    public $start_timeslot;
    public $end_timeslot;
    public $modified_by;
    public $appointment_date;

    
    function __construct(){
        parent::__construct("update_appointment");
    }
}

?>