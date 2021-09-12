<?php
namespace Api\Query;
use Api\Inputs\BaseInput;

class APIGetServices extends BaseInput{
    
    function __construct(){
        parent::__construct("get_services");
    }
}

?>