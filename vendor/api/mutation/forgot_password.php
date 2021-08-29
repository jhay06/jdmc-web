<?php
namespace Api\Mutation;

use Api\Inputs\BaseInput;

class APIForgotPassword extends BaseInput{
    public $email_address;
    
    function __construct(){
        parent::__construct("forgot_password");
    }
}

?>