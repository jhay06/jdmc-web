<?php
namespace Modules\Constants;

abstract class AffiliateLevel{

   const Platinum=1;
   const Gold=2;
   const Silver=3;
   static function get_name($val){
     switch($val){
        case AffiliateLevel::Platinum:
            return 'Platinum';
        case AffiliateLevel::Gold:
            return 'Gold';
         case AffiliateLevel::Silver:
            return 'Silver';
     }
   }
    
}

?>