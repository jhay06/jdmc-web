<?php
namespace Api\Mutation;

use Api\Inputs\BaseInput;

class APIChangePassword extends BaseInput{
    public $username;
    public $new_password;
    public $old_password;
    
    function __construct(){
        parent::__construct("change_password");
    }
}

?>