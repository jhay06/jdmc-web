<?php
namespace Api\Mutation;

use Api\Inputs\BaseInput;

class APIUpdateTutorial extends BaseInput{
    public $video_id;
    public $youtube_id;
    public $video_title;
    public $youtube_link;
    public $video_description;
    public $modified_by;
    
    function __construct(){
        parent::__construct("update_tutorial");
    }
}

?>