<?php
namespace Api\Query;
use Api\Inputs\BaseInput;

class APIGetActiveAppointmentByRange extends BaseInput{
    public $username;
    public $branch_code;
    public $from_range;
    public $to_range;
    function __construct(){
        parent::__construct("get_active_appointment_by_range");
    }
}

?>