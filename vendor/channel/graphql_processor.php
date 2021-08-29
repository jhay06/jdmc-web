<?php
namespace Channel\GraphQL;
use API\Response\BaseResponse;
use Karriere\JsonDecoder\JsonDecoder;
class GraphQLConnector{
    private $conf;
    function __construct($conf){
        $this->conf=$conf;
        
    }
    function process($json=null):BaseResponse{
        if($json !=null){
            
            $opts=array('http'=>
            array(
                'method'=>'POST',
                'header'=>'Content-Type: application/json',
                'content'=>json_encode($json)
            )

            );
            $context=stream_context_create($opts);
            
            $res= file_get_contents($this->conf->api_endpoint,false,$context);
	   
	    if($res !=null){
	
	        $decoder=new JsonDecoder();
        	    	return $decoder->decode($res,BaseResponse::class);
	    }
	    $base=new BaseResponse();
	    $base->errors=array("Unable to connect to server");
	    return $base;
        }
    }
}
?>