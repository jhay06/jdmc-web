<?php
namespace Api\Query;
use Api\Inputs\BaseInput;

class APIGetProductById extends BaseInput{
    public $service_id;
    function __construct(){
        parent::__construct("get_product_by_id");
    }
}

?>