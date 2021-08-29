<?php
namespace Api\Query;
use Api\Inputs\BaseInput;

class APIGetBranches extends BaseInput{
  
    function __construct(){
        parent::__construct("get_branches");
    }
}

?>