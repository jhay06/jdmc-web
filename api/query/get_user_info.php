<?php
namespace Api\Query;
use Api\Inputs\BaseInput;

class APIGetUserInfo extends BaseInput{
    public $username;
    function __construct(){
        parent::__construct("get_user_info");
    }
}

?>