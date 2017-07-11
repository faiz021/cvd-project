<?php


class percent {

   public static function total_percent($totalpoints, $gender) {
    
        if ($gender == "Male") {
          $percent = 0;
          if($totalpoints <= -1 ){
                $percent = 2;
            }else if ($totalpoints == 0) {
                $percent = 3;
            }else if ($totalpoints == 1) {
                $percent = 3;
            }else if ($totalpoints == 2) {
                $percent = 4;
            }else if ($totalpoints == 3) {
                $percent = 5;
            }else if ($totalpoints == 4) {
                $percent = 7;
            }else if ($totalpoints == 5) {
                $percent = 8;
            }else if ($totalpoints == 6) {
                $percent = 10;
            }else if ($totalpoints == 7) {
                $percent = 13;
            }else if ($totalpoints == 8) {
                $percent = 16;
            }else if ($totalpoints == 9) {
                $percent = 20;
            }else if ($totalpoints == 10) {
                $percent = 25;
            }else if ($totalpoints == 11) {
                $percent = 31;
            }else if ($totalpoints == 12) {
                $percent = 37;
            }else if ($totalpoints == 13) {
                $percent = 45;
            }else if($totalpoints >= 14) {
                $percent = 53;
            }
            return $percent;
            
        } else if ($gender == "Female") {
            $percent = 0;
            
            if($totalpoints <= -2 ){
                $percent = 1;
            }else if ($totalpoints == -1) {
                $percent = 2;
            }else if ($totalpoints == 0) {
                $percent = 2;
            }else if ($totalpoints == 1) {
                $percent = 2;
            }else if ($totalpoints == 2) {
                $percent = 3;
            }else if ($totalpoints == 3) {
                $percent = 3;
            }else if ($totalpoints == 4) {
                $percent = 4;
            }else if ($totalpoints == 5) {
                $percent = 4;
            }else if ($totalpoints == 6) {
                $percent = 5;
            }else if ($totalpoints == 7) {
                $percent = 6;
            }else if ($totalpoints == 8) {
                $percent = 7;
            }else if ($totalpoints == 9) {
                $percent = 8;
            }else if ($totalpoints == 10) {
                $percent = 10;
            }else if ($totalpoints == 11) {
                $percent = 11;
            }else if ($totalpoints == 12) {
                $percent = 13;
            }else if ($totalpoints == 13) {
                $percent = 15;
            }else if ($totalpoints == 14) {
                $percent = 18;
            }else if ($totalpoints == 15) {
                $percent = 20;
            }else if ($totalpoints == 16) {
                $percent = 24;
            }else if($totalpoints > 17) {
                $percent = 27;
            }
            return $percent;
        }
        
        
        
    }
    
  
}
?>
