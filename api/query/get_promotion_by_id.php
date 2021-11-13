<?php
namespace Api\Query;
use Api\Inputs\BaseInput;

class APIGetPromotionById extends BaseInput{
    public $promotion_id;
    function __construct(){
        parent::__construct("get_promotion_by_id");
    }
}

?>