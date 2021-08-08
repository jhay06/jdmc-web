<?php
session_start();

error_reporting(E_ERROR);
ini_set('display_errors', true);
ini_set('display_startup_errors', true);
ini_set('xmlrpc_errors', true);

require('config.php');
require('includes/require_components.php');

//require("modules/constants/affiliate_level.php");

$config=new Configuration("global.json");
$GLOBALS['app']=$config->get_app_config();
$GLOBALS['api']=$config->get_api_config();
if(isset($_SESSION['login_hash'])){
    $GLOBALS['_user']=json_decode(base64_decode($_SESSION['login_hash']));
}
$GLOBALS['_location']="/";

class Router{
    private $config_file;
    function __construct($config_file=null){
        $this->config_file=$config_file;
    }
    function is_routed($request_uri,$query=null){
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
                $execute=false;
              
                if(property_exists($route,'execute')){
                    $execute=$route->execute;
                }
                
                if($routed ==false){
                    
                    if($request_uri[0]=='/'){
                        $request_uri=substr($request_uri,1,strlen($request_uri)-1);
                    }
                    if($execute){
                        if(file_exists($request_uri)){
                           
                                if($query !=null){
                                    $_parser=parse_str($query,$output);
                                    foreach($_parser as $key=>$value){
                                        $_GET[$key]=$value;
                                    }
                                }
                                include($request_uri);
                           

                        }else{
                            http_response_code(404);
                        }
                       
                    }else{
                        
                      
                        if(file_exists($request_uri)){
                            
                            //header("Set-Cookie: cross-site-cookie=whatever; SameSite=Strict; Secure");
                             header("Content-Type: ".$route->mime);
                             header("Content-Length: ".filesize($request_uri));
                             $file=fopen($request_uri,'rb');
                             $data=fread($file,filesize($request_uri));
                             fclose($file);
                             if($query !=null){
                                $_parser=parse_str($query,$output);
                                foreach($_parser as $key=>$value){
                                    $_GET[$key]=$value;
                                }
                            }
                             echo $data;
                            
      
                        }else{
                        
                           http_response_code(400);
                        }  
                    }                      
                    

                }else{

                }
                return $routed;
            }
        }
        return true;

    }
    function get_map($maps,$lookup){
      //  $keys=get_object_vars($maps);
        foreach($maps as $key=>$value){
            $pattern="#".$key."#";
           
            if(preg_match_all($pattern,$lookup,$matches)){
                if(count($matches) > 1){
                    
                    return preg_replace($pattern,$value,$lookup);
                }
               
            }
        }
        return false;
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
                $_SERVER['PHP_SELF']=$request_uri;
                $request_uri_sp=explode('?',$request_uri);
                
                $request_uri=$request_uri_sp[0];
                $json_data=json_decode($data);
                $query=null;
              
                if(count($request_uri_sp) > 1){
                    $_parser=parse_str($request_uri_sp[1],$output);
                    foreach($output as $key=>$value){
                        $_GET[$key]=$value;
                    }
                }
             
                $routed=$this->is_routed($request_uri,$request_uri_sp[1]);
                if($routed){
                   
                    $map=$this->get_map($json_data->url_rewrite,$request_uri);
                    if(!$map){

                        $map=$json_data->url_rewrite->{$request_uri};
                    }
                    $_SERVER['PHP_SELF']=$request_uri;
                    $actual_page=explode("?",$map);
                   
                    if($map !=null){
                        if(file_exists($actual_page[0])){
                             if(count($actual_page) > 1){
                                parse_str($actual_page[1],$output);
                                foreach ($output as $key => $value) {
                                    $_GET[$key] = $value;
                                }
                             }
                            $GLOBALS['_location']=$request_uri;
                            include($actual_page[0]);
                        }else{
                            throw new Exception("Page not found");
                        }
                    }else{
                   
                        //404
                    }
                }else{
                    //http_response_code(404);
                 
                }


            }catch(Exception $e){
                echo $e;
            }

         
        }
    }

}



?>