<?php
namespace Api\Mutation;

use Api\Inputs\BaseInput;

class APIDeletePromotion extends BaseInput{
    public $promotion_id;
    public $deleted_by;
    function __construct(){
        parent::__construct("delete_promotion");
    }
}

?>