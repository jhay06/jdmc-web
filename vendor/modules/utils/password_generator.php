<?php
namespace Modules\Utils;

class PasswordGenerator{
    private $small_letter="abcdefghijklmnopqrstuvwxyz";
    private $cap_letter="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    private $numeric="1234567890";
    private $spec_char="!@#$%^&*_-+=?/.|\\";
    function generate($len){
        $complete=$this->small_letter.$this->cap_letter.$this->numeric.$this->spec_char;
        $initial=$len;
        if($len > 3){
            $initial-=3;
        }
        $initial_pass= substr(str_shuffle($complete),0,$initial);
    
        //check if theres already small letter
        if(!preg_match("/[a-z]/",$initial_pass)){
            if(strlen($initial_pass) < $len){
                $initial_pass=$initial_pass.substr(str_shuffle($this->small_letter),0,1);
            }else{
                $initial_pass=generate($len);
            }
        }
    
        //has caps
        if(!preg_match("/[A-Z]/",$initial_pass)){
            if(strlen($initial_pass) < $len){
                $initial_pass=$initial_pass.substr(str_shuffle($this->cap_letter),0,1);
            }else{
                $initial_pass=generate($len);
            }
        }

        //has number

        if(!preg_match("/[0-9]/",$initial_pass)){
            if(strlen($initial_pass) < $len){
                $initial_pass=$initial_pass.substr(str_shuffle($this->numeric),0,1);
            }else{
                $initial_pass=generate($len);
            }
        }

        //has spec
        if(!preg_match("/\[-.!@#%^&*_+=?\/|\]/",$initial_pass)){
            if(strlen($initial_pass) < $len){
                $initial_pass=$initial_pass.substr(str_shuffle($this->spec_char),0,1);
            }else{
                $initial_pass=generate($len);
            }
        }
        if(strlen($initial_pass) < $len){
            $missing=$len-strlen($initial_pass);
            $initial_pass=$initial_pass.substr(str_shuffle($complete),0,$missing);
        }
        return $initial_pass;


    }
}
?>