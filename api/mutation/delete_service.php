<?php
namespace Api\Mutation;

use Api\Inputs\BaseInput;

class APIDeleteService extends BaseInput{
    public $service_id;
    public $deleted_by;
    function __construct(){
        parent::__construct("delete_service");
    }
}

?>