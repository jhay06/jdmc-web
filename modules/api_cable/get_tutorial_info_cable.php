<?php
use API\Query\APIGetTutorialInfo;
$video_id=0;
$youtube_id="";
$video_title="";
$video_description="";
$youtube_link="";

if(isset($_GET['tutorial'])){
   
    $youtube_id=$_GET['tutorial'];
    
    $api=new APIGetTutorialInfo();
    $api->youtube_id=$youtube_id;
    $var=$api->process();

    if($api->is_error()==false){
        $res=$api->get_result();
        if($res['type'] == 'success'){
            $data=$res['data'];
            $video_id=$data['video_id'] !==null?$data['video_id']:0;
            $youtube_id=$data['youtube_id'] !==null?$data['youtube_id']:"";
            $video_title=$data['video_title'] !==null?$data['video_title']:"";
            $video_description=$data['video_description'] !==null?$data['video_description']:"";
            $youtube_link=$data['youtube_link'] !==null?$data['youtube_link']:"";
        }   
      
    }
}else{
    if(isset($_POST['get_tutorial'])){
        $youtube_id=$_POST['youtube_id'];
        $args=array();
        if(!$youtube_id){
            $args['status']='failed';
            $args['message']='Missing youtube id';
        }else{
            $api=new APIGetTutorialInfo();
            $api->youtube_id=$youtube_id;
            $var= $api->process();
            if($api->is_error()){
                $args['status']='error';
                $args['message']='Unknown error, Please try again';
            }else{
                $res=$api->get_result();
                $args['status']=$res['type'];
                $args['message']=$res['message'];
                $args['data']=$res['data'];
            }

        }
        echo json_encode($args);
    }
}

?>