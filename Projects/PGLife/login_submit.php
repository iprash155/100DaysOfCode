<?php

    $db_hostname="127.0.0.1";
    $db_usersname="root";
    $db_password="";
    $db_name="test";

    //connection with database test
    $conn=mysqli_connect($db_hostname,$db_usersname,$db_password,$db_name);
    if (!$conn) {
        echo "connection failed: ".mysqli_connect_error();
        exit;
    }
    
    //storing enterend data in the login form
    $email=$_POST['email'];
    $password=$_POST['password'];


    //fetching row from table users having same email and password as entered in form, if there is any
    $sql="select * from users where email='$email' and password='$password'";
    $result=mysqli_query($conn,$sql);
    if (!$result) {
        echo "Error: ".mysqli_error();
        exit;
    }

    // storing row having same email and password as entered in form in $row,if there is any
    $row = mysqli_fetch_assoc($result);

    //checking if there is any row as required
    if($row){
        echo "hello ".$row['name'];
    }
    else{
        echo "login failed";
    }

    mysqli_close($conn);
    
    

?>