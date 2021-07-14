<?php
namespace Api;
use Api\Response\BaseResponse;
class ApiModel{
    private $model;
    private $model_file;
    function __construct($model,$model_file=null){
        $this->model=$model;
        $this->model_file=$model_file;
    }

    function get_request_model($input){
        if($this->model_file !=null){
            try{
                $path="config/".$this->model_file;
                $file=fopen($path,"r");
                $data=fread($file,filesize($path));
                fclose($file);
                $model=json_decode($data);
                $query= new \stdClass();
                $variable = new \stdClass();
                $variable->input=$input;
                $query->query=$model->{$this->model};
                $query->variables=$variable;
                $obj=(object) array_filter((array) $query);
                return $obj;

            }catch(Exception $ex){
                throw new Exception("Invalid model file");
            }
        }else{
            throw new Exception("Please set model file");
        }
    }

    function get_response(BaseResponse $response,$model=null){
        if($model !=null){
           return $response->data[$model]['data'];
        }else{
            return $response->data[$this->model]['data'];
        }
       
    }

}

?>