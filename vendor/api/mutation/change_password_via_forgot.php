<?php
namespace Api\Mutation;

use Api\Inputs\BaseInput;

class APIChangePasswordViaForgot extends BaseInput{
    public $email_address;
    public $reset_key;
    public $new_password;
    public $username;
    
    function __construct(){
        parent::__construct("change_password_via_forgot");
    }
}

?>