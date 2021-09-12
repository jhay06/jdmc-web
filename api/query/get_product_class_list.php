<?php
namespace Api\Query;
use Api\Inputs\BaseInput;

class APIGetProductClassList extends BaseInput{
  
    function __construct(){
        parent::__construct("get_product_class_list");
    }
}

?>