<?php
namespace Api\Query;
use Api\Inputs\BaseInput;

class APIGetTutorialList extends BaseInput{
  
    function __construct(){
        parent::__construct("get_tutorial_list");
    }
}

?>