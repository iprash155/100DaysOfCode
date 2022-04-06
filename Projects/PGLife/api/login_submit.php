<?php
    //starting sessoin
    session_start();

    //conneting to database
    require("../includes/database_connect.php");

    //storing data filled in form by post method
    $email=$_POST['email'];
    $password=$_POST['password'];
    // encrypting password filled by user by sha1 encryption , as it's not ethical to store password by a developper
    $password=sha1($password);


    //quety to retrive all the rows matches with same email and password as entered by user
    $sql="SELECT * from users where email='$email' AND password='$password'";

    //storing all the rows containin same emails and password as entered by user from the user table
    $result=mysqli_query($conn,$sql);   

    //checking error in executing query
    if (!$result) {
        $response = array("success"=>false , "message"=>"something went wrong");
        echo json_encode($response);
        return;
    }

    //fetching all the row from $result
    $row=mysqli_fetch_assoc($result);

    //checking if user has signed-up
    if (!$row) {
        $response = array("success"=>false , "message"=>"this email is not registered with us");
        echo json_encode($response);
        return;
    }
    if ($row) {
        $_SESSION['user_id']=$row['id'];
        $_SESSION['full_name']=$row['full_name'];
        $_SESSION['email'] = $row['email'];
    }
    mysqli_close($conn);
?>
