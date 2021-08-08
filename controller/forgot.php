<?php
    use API\Mutation\APIValidKey;
    if(isset($_POST['forgot_password'])){
        $reset_key=$_POST['reset_key'];
        $email_address=$_POST['email_address'];
        $username=$_POST['username'];
        $complete=true;
        if(!$reset_key || !$email_address || !$username){
            $complete=false;
        }
        if($complete){
            $valid=new APIValidKey();
            $valid->email_address=$email_address;
            $valid->reset_key=$reset_key;
            $res= $valid->process();
     
            if($valid->is_error()==false){

                $res=$valid->get_result();
                if($res['type']=='success'){
                    $new_style="<style>
                        .invalid-link{
                            display:none !important;

                        }
                        .forgot-form{
                            display:inline-block !important;
                        }
                    </style>
                    ";
                }
            }
        }
    }
    include_once('templates/global/forgot.html');


?>