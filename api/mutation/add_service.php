<?php
namespace Api\Mutation;

use Api\Inputs\BaseInput;

class APIAddService extends BaseInput{
    public $product_code;
    public $product_name;
    public $class_id;
    public $product_description;
    public $image_file;
    public $created_by;
    
    function __construct(){
        parent::__construct("add_service");
    }
}

?>