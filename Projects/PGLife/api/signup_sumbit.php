<?php
    //starting session
    session_start();
    
    //connecting database
    require("includes/database_connect.php");

    //storing data filled in form by post method
    $full_name=$_POST['full_name'];
    $phone_no=$_POST['phone'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $college_name=$_POST['college_name'];
    $gender=$_POST['gender'];
    $full_name=$_POST['full_name'];

    //query to retrive all the emails
    $sql="select * from users where email="$email"";

    //retrving all the emails
    $result=mysqli_query($conn,$sql);   

    //checking error in executing query
    if (!$result) {
        echo "something went wrong"
        exit;
    }

    //checking if user is already registered via email
    $row_count=mysqli_num_rows($result);                 //this function returns no of rows in $result

    if ($row_count!=0) {
        echo "This email-id is already registered with us";
        exit;
    }

    //sql query to insert filled data into table
    $sql="INSERT INTO users (email, password, full_name, phone,gender, college_name) values ('$email','$password','$full_name','$phone_no','$gender','$college_name')";

    // inserting data into table
    $result=mysqli_query($conn,$sql);

    //checking error in executing query
    if (mysqli_error) {
        echo "something went wrong";
        exit;
    }

    echo "your account has been successfully created";
?>
    click <a href="../index.php">here</a> to continue.
<?php
    //closing connection
    mysqli_close($conn);
?>