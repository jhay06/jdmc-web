<?php
namespace Api\Mutation;
use Api\Inputs\BaseInput;
class APILogin extends BaseInput{
    public $username;
    public $password;
    function __construct(){
        parent::__construct("login");
    }
    

}

?>