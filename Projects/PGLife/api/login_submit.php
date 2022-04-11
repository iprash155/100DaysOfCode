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
    if (mysqli_num_rows($result)==0) {
        $response = array("success"=>false , "message"=>"invalid email or password");
        echo json_encode($response);
        return;
    }

    //fetching the row from $result
    $user=mysqli_fetch_assoc($result);

        $_SESSION['user_id']=$user['id'];
        $_SESSION['full_name']=$user['full_name'];
        $_SESSION['email'] = $user['email'];

        $response = array("success"=>true);
        echo json_encode($response);

    mysqli_close($conn);
?>
