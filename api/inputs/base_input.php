<?php

namespace Api\Inputs;
use Api\ApiModel;
use Api\Response\BaseResponse;
use Channel\GraphQL\GraphQLConnector;
require("api/mutation/login.php");
require("api/mutation/register.php");
require("api/query/get_user_list.php");

class BaseInput{
    private  $apimodel;
    private $response;
    function __construct($model){
        $this->apimodel=new ApiModel($model,"api_model.json");
    }

    function process():BaseResponse{
        $req=$this->apimodel->get_request_model($this);
     
        $graphi=new GraphQLConnector($GLOBALS['api']);

        $this->response=$graphi->process($req);
        
	
        return $this->response;
    }

    function is_error(){
        if($this->response->errors !=null){
        
            return true;
        }
        return false;
    }
    function get_result(){
        return $this->apimodel->get_response($this->response);
    }

}

?>