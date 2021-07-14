<?php

namespace Api\Query;
use Api\Inputs\BaseInput;

class APIGetUserList extends BaseInput{
    public $profile_id;
    public $affiliate_level;
    function __construct(){
        parent::__construct("get_user_list");
    }
}


?>