<?php
namespace Api\Mutation;

use Api\Inputs\BaseInput;

class APIAddPromotion extends BaseInput{
   
    public $promotion_name;
   
    public $description;
    public $status;
    public $image_file;
    public $created_by;
    
    function __construct(){
        parent::__construct("add_promotion");
    }
}

?>