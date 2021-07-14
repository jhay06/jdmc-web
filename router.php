<?php
error_reporting(E_ALL ^ E_WARNING);
require('config.php');
require("api/api_model.php");
require("api/inputs/base_input.php");
require('channel/graphql_processor.php');
require("api/response/base_response.php");
require("modules/constants/affiliate_level.php");

$config=new Configuration("global.json");
$app=$config->get_app_config();
$api=$config->get_api_config();
class Router{
    private $config_file;
    function __construct($config_file=null){
        $this->config_file=$config_file;
    }
    function is_routed($request_uri){
        $path="config/mimes.json";
        $file=fopen($path,"r");
        $mime_txt=fread($file,filesize($path));
        fclose($file);
        $mime_array= json_decode($mime_txt);
        $keys=array_keys((array) $mime_array);
        $i=-1;
        foreach($keys as $key){
            
            if(substr_count($request_uri,$key) >  0){
                $route=$mime_array->{$key};
                $routed=$route->route;
               
                if($routed ==false){
                   if($request_uri[0]=='/'){
                       $request_uri=substr($request_uri,1,strlen($request_uri)-1);
                   }
                   header("Content-Type: ".$route->mime);
                   header("Content-Length: ".filesize($request_uri));
                   readfile($request_uri);
                }
                return $routed;
            }
        }
        return true;

    }

    function start_routing(){
        if($this->config_file == null){
            throw new Exception("Please add config file");
        }else{
            try{

                $path="config/".$this->config_file;
        
                $file=fopen($path,"r");
                $data=fread($file,filesize($path));
                fclose($file);
                $request_uri=$_SERVER['REQUEST_URI'];
                $json_data=json_decode($data);
                $routed=$this->is_routed($request_uri);
                if($routed){
                    $map=$json_data->url_rewrite->{$request_uri};
                    if($map !=null){
                        if(file_exists($map)){
    
                            include($map);
                        }else{
                            throw new Exception("Page not found");
                        }
                    }else{
                        //404
                    }
                }


            }catch(Exception $e){
                echo $e;
            }

         
        }
    }

}

$route=new Router("routing_config.json");
$route->start_routing();

?>