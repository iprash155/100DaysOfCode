<?php
      $abc="hello world";
      function a(){
            global $abc;
            $abc="hey";
            echo $abc;
      }
      function b(){
            
            echo $abc;
      }
      a();
      echo $abc;
?>