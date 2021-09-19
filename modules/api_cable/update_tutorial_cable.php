<?php
use API\Mutation\APIUpdateTutorial;
include_once("controller/session_check.php");
if(isset($_POST['update_tutorial'])){
    $modified_by=$current_user->username;
    $video_id=intval($_POST['video_id']);
    $youtube_id=$_POST['youtube_id'];
    $video_title=$_POST['video_title'];
    $youtube_link= $_POST['youtube_link'];
    $video_description = $_POST['video_description'];
    $args=array();
    if(!isset($modified_by)){
        $args['status']='failed';
        $args['message']='Unable to process the request, Please refresh your browser';

    }else if($video_id == 0){
        $args['status']='failed';
        $args['message']='Unknown video';
    }else if(!isset($youtube_id)){
        $args['status']='failed';
        $args['message']='Youtube id is required';
    }else if(!isset($video_title)){
        $args['status']='failed';
        $args['message']="Video title is required";
    }else if(!isset($youtube_link)){
        $args['status']='failed';
        $args['message']='Youtube link is required';

    }else if(!isset($video_description)){
        $args['status']='failed';
        $args['message']='Video Description is required';
   
    }else{
        $api=new APIUpdateTutorial();
        $api->video_id=$video_id;
        $api->youtube_id=$youtube_id;
        $api->video_title=$video_title;
        $api->youtube_link=$youtube_link;
        $api->video_description=$video_description;
        $api->modified_by=$modified_by;
        $var = $api->process();
        if($api->is_error()){
            $args['status']='error';
            $args['message']='Unknown error, Please try again';
            $args['data']=$var;
        }else{
            $res=$api->get_result();
            $args['status']=$res['type'];
            $args['message']=$res['message'];
        }
    }
    print json_encode($args);
}else{
    http_response_code(404);
}

?>