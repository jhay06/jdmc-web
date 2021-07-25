<?php
namespace Modules\Constants;

abstract class ProfileLevel{

   const Superuser=1;
   const Staff=2;
   const Dentist=3;
   static function get_name($val){
     switch($val){
        case ProfileLevel::Superuser:
            return 'Superuser';
        case ProfileLevel::Staff:
            return 'Staff';
         case ProfileLevel::Dentist:
            return 'Dentist';
     }
   }
    
}

?>