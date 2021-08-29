<?php
namespace Api\Query;
use Api\Inputs\BaseInput;

class APIGetActiveAppointmentByUsername extends BaseInput{
    public $username;
    public $branch_code;
    function __construct(){
        parent::__construct("get_active_appointment_by_username");
    }
}

?>