<?php
namespace Api\Query;
use Api\Inputs\BaseInput;

class APIGetPromotionList extends BaseInput{
    
    function __construct(){
        parent::__construct("get_promotion_list");
    }
}

?>