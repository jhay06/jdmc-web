<?php
    use API\Query\APIGetTutorialList;
    if(isset($_POST['get_tutorial'])){
        $api=new APIGetTutorialList();
        $has_pagination=false;
        if(!$_POST['has_pagination']){
            $has_pagination=false;
        }else{
            $has_pagination=$_POST['has_pagination']==="true"?true:false;
        }
        $page=0;
        $limit=0;
        if($has_pagination){
            $page=intval($_POST['page']);
            $limit=intval($_POST['limit']);
            $api->set_pagination($page,$limit);
        }
        $var = $api->process();
        $args=array();
        if($api->is_error()){
            $args['status']='error';
            $args['message']='Unknown error, Please try again';
            $args['data']=$var;
        }else{
            $res= $api->get_result();
            $args['status']= $res['type'];
            $args['message']= $res['message'];
            $args['data']=$res['data'];
            if($has_pagination){

                 $args['pagination']=$res['pagination'];
            }
    
        }
        print json_encode($args);
    }else{
        http_response_code(404);
    }
   
?>