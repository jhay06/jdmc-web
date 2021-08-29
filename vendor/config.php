<?php
require __DIR__.'/vendor/autoload.php';
use Karriere\JsonDecoder\JsonDecoder;
class AppConfiguration{
    public $title;
    public $code;
    public $copyright;
    public $webmaster;
   

}


class OwnerConfiguration{
   public $name;
   public $address;
   public $contact_number;
}

class ApiConfiguration{
    public $api_key;
    public $api_endpoint;
}


class Configuration{
    public $file_name;
    public $data;
    function __construct($file_name=null){
        $this->file_name=$file_name;
        if($this->file_name !=null){
            $path="config/".$this->file_name;
            $f=fopen($path,"r");
            $text=fread($f,filesize($path));
            fclose($f);
            $this->data=json_decode($text);
        }
    }
    function get_app_config():AppConfiguration{
        $jsonDecoder=new JsonDecoder();
        //echo $this->data->app;
        return $jsonDecoder->decode(json_encode($this->data->app),AppConfiguration::class);
        
    }

    function get_owner_config():OwnerConfiguration{
        $jsonDecoder=new JsonDecoder();
        return $jsonDecoder->decode(json_encode($this->data->owner),OwnerConfiguration::class);
    }
    function get_api_config():ApiConfiguration{
        $jsonDecoder=new JsonDecoder();
   
        return $jsonDecoder->decode(json_encode($this->data->api),ApiConfiguration::class);
    }
}
?>