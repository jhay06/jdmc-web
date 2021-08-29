<?php
use API\Query\APIGetBranches;
if(isset($_POST['get_branches'])){
    $api_get=new APIGetBranches();
    $var=$api_get->process();
    $arr=array();
    if($api_get->is_error()){
        $arr['status']='error';
        $arr['message']='Unknown error, Please try again later';
        $arr['data']=$var;
    }else{
        $res=$api_get->get_result();
        $arr['status'] = $res['type'];
        $arr['message'] = $res['message'];
        $arr['data']=$res['data'];
    }
    print json_encode($arr);
}else{
    http_response_code(404);
}




?>