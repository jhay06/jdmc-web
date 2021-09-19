<?php
namespace Api\Mutation;

use Api\Inputs\BaseInput;

class APIDeleteTutorial extends BaseInput{
    public $video_id;
    public $deleted_by;
    function __construct(){
        parent::__construct("delete_tutorial");
    }
}

?>