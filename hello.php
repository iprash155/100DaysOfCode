<?php
      $abc="hello world";
      function a(){
            $abc="hey";
            echo $abc;
      }
      function b(){
            
            echo $abc;
      }
      a();
      b();
      echo $abc;
?>