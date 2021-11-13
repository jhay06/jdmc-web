<?php
namespace Api\Mutation;

use Api\Inputs\BaseInput;

class APIUpdatePromotion extends BaseInput{
    public $promotion_id;
    public $image_id;
    public $upload_new_file;
    public $status;
    public $description;
    public $promotion_name;
    public $image_file;
    public $modified_by;
    
    function __construct(){
        parent::__construct("update_promotion");
    }
}

?>