<?php
namespace Api\Query;
use Api\Inputs\BaseInput;

class APIGetProductByProductCode extends BaseInput{
    public $product_code;
    function __construct(){
        parent::__construct("get_product_by_product_code");
    }
}

?>