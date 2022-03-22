<?php 
      $students = array(
                  "prashant"=>array("physics"=>98,"chemistry"=>97,"maths"=>97),
                  "meet"=>array("physics"=>84,"chemistry"=>97,"maths"=>78),
                  "visharg"=>array("physics"=>95,"chemistry"=>96,"maths"=>97),
      );
      
      foreach ($students as $student_name => $subjects) {
            foreach ($subjects as $subject_name => $marks) {
                  echo $student_name." has scored ".$marks." in ".$subject_name. "\r\n";
            }
      }
        
        
?>
  