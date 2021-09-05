<?php
namespace Api\Mutation;

use Api\Inputs\BaseInput;

class APICancelAppointment extends BaseInput{
    public $reference_codes;
    public $cancelled_by;
    
    function __construct(){
        parent::__construct("cancel_appointment");
    }
}

?>