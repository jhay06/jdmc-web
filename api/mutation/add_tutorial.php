<?php
namespace Api\Mutation;

use Api\Inputs\BaseInput;

class APIAddTutorial extends BaseInput{
    public $youtube_id;
    public $video_title;
    public $youtube_link;
    public $video_description;
    public $created_by;
    
    function __construct(){
        parent::__construct("add_tutorial");
    }
}

?>