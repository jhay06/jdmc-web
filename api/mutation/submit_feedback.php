<?php
namespace Api\Mutation;

use Api\Inputs\BaseInput;

class APISubmitFeedback extends BaseInput{
    public $full_name;
    public $contact_no;
    public $email_address;
    public $message;
    function __construct(){
        parent::__construct("submit_feedback");
    }
}

?>