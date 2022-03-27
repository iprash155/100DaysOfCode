<?php


    $db_hostname="127.0.0.1";
    $db_username="root";
    $db_password="";
    $db_name="test";

    // establishing connnection with mysql server
    $conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
    
    //checking if connection is established
    if (!$conn) {
        echo "connection failed: ".mysqli_connect_error();
        exit;
    }

    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];


    // query to insert a row in table
    $sql="insert into users (name,email,password) values ('$name','$email','$password')";

    //executing query
    $result=mysqli_query($conn,$sql);

    //checking if sql query inserts the data
    if (!$result) {
        echo "Error: ".mysqli_error();
        exit;
    }

    echo "registration successful";
    mysqli_close($conn);
?>