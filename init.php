<?php
spl_autoload_register(function ($class_name) {
    
    include_once(strtolower($class_name).".php");
    
 

});

$route=new Router("routing_config.json");

$route->start_routing();    
?>