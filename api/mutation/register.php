<?php
namespace Api\Mutation;

use Api\Inputs\BaseInput;

class APIRegister extends BaseInput{
    public $username;
    public $employee_no;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $suffix;
    public $is_accreditation;
    public $affiliate_level;
    public $email_address;
    public $contact_number;
    public $password;
    public $is_active;
    function __construct(){
        parent::__construct("register");
    }
}

?>