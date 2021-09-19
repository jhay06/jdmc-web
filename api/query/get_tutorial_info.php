<?php
namespace Api\Query;
use Api\Inputs\BaseInput;

class APIGetTutorialInfo extends BaseInput{
    public $youtube_id;
    function __construct(){
        parent::__construct("get_tutorial_info");
    }
}

?>