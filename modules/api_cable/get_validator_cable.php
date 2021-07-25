<?php
use Api\Query\APIGetValidator;

if(isset($_POST['validator'])){
    $arr=array();
    if(isset($_POST['validate'])){
        $api_validator=new APIGetValidator();
        $api_validator->validate=$_POST['validate'];
        $res=$api_validator->process();
        if($api_validator->is_error()==false){
            $result=$api_validator->get_result();
            if($result['type']=='success'){
                $arr['status']='success';
                $arr['message']='got a validator';
                $arr['data']=$result['data'];
            }else{
                $arr['status']=$res['type'];
                $arr['message']=$res['message'];
            }
        }else{
            $arr['status']='error';
            $arr['message']='Unknown error, Please try again later';
        }
        print json_encode($arr);
    }
}else{
    http_response_code(404);
}

?>