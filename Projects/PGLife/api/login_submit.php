<?php
    //starting sessoin
    session_start();

    //conneting to database
    require("includes/database_connect.php");

    //storing data filled in form by post method
    $email=$_POST['email'];
    $password=$_POST['password'];

    //quety to retrive all the rows matches with same email and password as entered by user
    $sql="SELECT * from users where email="$email" AND password="$password"";

    //storing all the rows containin same emails and password as entered by user from the user table
    $result=mysqli_query($conn,$sql);   

    //checking error in executing query
    if (!$result) {
        echo "something went wrong"
        exit;
    }

    //fetching all the row from $result
    $row=mysqli_fetch_assoc($result);

    //checking if user has signed-up
    if (!$row) {
        echo "This email-id is not registered with us";
        exit;
    }
    if ($row) {
        $_SESSION['user_id']=$row['id'];
        $_SESSION['full_name']=$row['full_name'];
        header("location: ../index.php");
    }
    mysqli_close($conn);
?>
