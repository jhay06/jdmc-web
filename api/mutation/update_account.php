<?php
namespace Api\Mutation;

use Api\Inputs\BaseInput;

class APIUpdateAccount extends BaseInput{
    public $username;
    public $new_username;
    
    public $employee_no;
    public $new_employee_no;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $suffix;
    public $profile_id;
    public $affiliate_level_id;
    public $email_address;
    public $contact_no;
    public $date_registered;
    public $is_activated;
    function __construct(){
        parent::__construct("update_account");
    }
}

?>