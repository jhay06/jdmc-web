<?php
namespace Api\Mutation;

use Api\Inputs\BaseInput;

class APIUpdateService extends BaseInput{
    public $service_id;
    public $upload_new_file;
    public $product_code;
    public $product_name;
    public $class_id;
    public $product_description;
    public $image_file;
    public $modified_by;
    
    function __construct(){
        parent::__construct("update_service");
    }
}

?>