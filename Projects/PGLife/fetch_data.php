<?php

    $db_hostname="127.0.0.1";
    $db_username="root";
    $db_password="";
    $db_name="test";

    //connecting to database
    $conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);

    //checking connection and if not connected displaying error message
    if (!$conn) {
        echo "connection failed ".mysqli_connect_error();
    }

    //fetching data from table
    $sql="select * from users";

    $result=mysqli_query($conn,$sql);

    //displaying error message in  query execution if there is any
    if (!$result) {
        echo "Error : ".mysqli_error(); 
    }

    while ($row=mysqli_fetch_assoc($result)) {
        
        echo $row['id']."  ".$row['name']."  ".$row['email']."  ".$row['password']."<br>";
    }
    mysqli_close($conn);
?>