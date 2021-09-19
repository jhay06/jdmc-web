<?php
use API\Mutation\APIAddTutorial;
include_once("controller/session_check.php");
if(isset($_POST['add_tutorial'])){
    $user=$current_user->username;
    $youtube_id=$_POST['youtube_id'];
    $video_title=$_POST['video_title'];
    $youtube_link=$_POST['youtube_link'];
    $video_description= $_POST['video_description'];
    $args=array();
    if(!$user){
        $args['status']='failed';
        $args['message']='Unable to process, please refresh your browser';
    }else
    if(!$youtube_id){
        $args['status']='failed';
        $args['message']='Youtube id is required';
    }else if(!$video_title){
        $args['status']='failed';
        $args['message']='Video title is required';

    }else if(!$youtube_link){
        $args['status']='failed';
        $args['message']='Youtube link is required';
    }else{
        $api=new APIAddTutorial();
        $api->youtube_id=$youtube_id;
        $api->video_title=$video_title;
        $api->youtube_link=$youtube_link;
        $api->video_description=$video_description;
        $api->created_by=$user;
        $var= $api->process();
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
    echo json_encode($args);
    
}

?>