<?php
namespace Api\Query;
use Api\Inputs\BaseInput;

class APIGetPromotionByImageId extends BaseInput{
    public $image_id;
    function __construct(){
        parent::__construct("get_promotion_by_image_id");
    }
}

?>