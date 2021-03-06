<?php
    
    //connecting database
    require("../includes/database_connect.php");

    //storing data filled in form by post method
    $full_name=$_POST['full_name'];
    $phone_no=$_POST['phone'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    // encrypting password filled by user by sha1 encryption , as it's not ethical to store password by a developper
    $password=sha1($password);
    $college_name=$_POST['college_name'];
    $gender=$_POST['gender'];

    //query to retrive all the emails
    $sql="SELECT * from users where email='$email'";

    //retrving all the emails
    $result=mysqli_query($conn,$sql);   

    //checking error in executing query
    if (!$result) {
        $response = array("success"=>false , "message"=>"something went wrong");
        echo json_encode($response);
        return;
    }

    //checking if user is already registered via email
    $row_count=mysqli_num_rows($result);                 //this function returns no of rows in $result

    if ($row_count != 0) {
        $response = array("success"=>false, "message"=>"This email-id is already registered with us");
        echo json_encode($response);
        return;
    }

    //sql query to insert filled data into table
    $sql_1="INSERT INTO users (email, password, full_name, phone,gender, college_name) values ('$email','$password','$full_name','$phone_no','$gender','$college_name')";

    // inserting data into table
    $result_1=mysqli_query($conn,$sql_1);

    //checking error in executing query
    if (!$result_1) {
        $response = array("success"=>false , "message"=>"something went wrong");
        echo json_encode($response);
        return;
    }
    elseif ($result_1) {
        $user=mysqli_fetch_assoc($result_1);

        $_SESSION['user_id']=$user['id'];
        $_SESSION['full_name']=$user['full_name'];
        $_SESSION['email']=$user['email'];

        $response = array("success"=>true , "message"=>"your account has been successfully created");
        echo json_encode($response);
    }

    //closing connection
    mysqli_close($conn);
?>