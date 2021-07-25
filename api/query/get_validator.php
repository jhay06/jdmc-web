<?php
namespace Api\Query;
use Api\Inputs\BaseInput;

class APIGetValidator extends BaseInput{
    public $validate;

    function __construct(){
        parent::__construct("get_validator");
    }
}




?>