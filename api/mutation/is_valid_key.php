<?php
namespace Api\Mutation;

use Api\Inputs\BaseInput;

class APIValidKey extends BaseInput{
    public $email_address;
    public $reset_key;
    
    function __construct(){
        parent::__construct("is_valid_key");
    }
}

?>