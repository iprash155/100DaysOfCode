<?php
    session_start();
    //database connection
    require "../includes/database_connect.php";
    //checking if user is logged-in
    if ((!isset($_SESSION('user_id'))) {
        echo "user is not logged-in";
        return;
    }
    //assigning important data
    $user_id=$_SESSION['user_id'];
    $property_id=$_GET['property_id'];
    // selecting row
    $sql = "SELECT * from interested_users_properties where user_id=$user_id and property_id=$property_id";
    $reult=mysqli_query($conn,$sql);
    if (!$result) {
        echo "something went wrong";
        return;
    }
    
    if (mysqli_num_rows($result>0)) {  // case of property is liked already 
        // deleting row from database as user disliked property
        $sql_1= "DELETE from interest_users_properties where user_id=$user_id and property_id=$property_id";
        $result_1=mysqli_query($conn,$sql_1);
        if (!$result_1) {
            echo "something went wrong";
            return;
        }
        else{
            echo "property disliked";
            return;
        }
    }
    else { // case of property is not liked
        // inserting row as user liked property
        $sql_3 = "INSERT INTO interested_users_properties (user_id, property_id) VALUES ('$user_id', '$property_id')";
        $result_2=mysqli_query($conn,$sql_2);
        if (!$result_2) {
            echo "something went wrong";
            return;
        }
        else {
            echo "property liked";
            return;
        }
        
    }
    

mysqli_close($conn);

?>