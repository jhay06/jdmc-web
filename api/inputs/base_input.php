<?php

namespace Api\Inputs;
use Api\ApiModel;
use Api\Response\BaseResponse;
use Channel\GraphQL\GraphQLConnector;
class Pagination{
    public $page;
    public $limit_page;
    public $has_pagination;
}

class BaseInput{
    private  $apimodel;
    private $pagination;
    private $response;
    function __construct($model){
        $this->apimodel=new ApiModel($model,"api_model.json");
        $this->pagination=null;
    }   
    function set_pagination($page,$limit_page){
        $this->pagination=new Pagination();
        $this->pagination->page=$page;
        $this->pagination->limit_page=$limit_page;
        $this->pagination->has_pagination=true;
    }
    

    function process():BaseResponse{
        $req=$this->apimodel->get_request_model($this,$this->pagination);
     
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