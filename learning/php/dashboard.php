<?php
    //starting sessoin
    session_start();

    //accessign session
    $user_id=$_SESSION['user_id'];
    $name=$_SESSION['name'];

    //accessing cookie
    // $user_id=$_COOKIE['user_id'];
    // $name=$_COOKIE['name'];

    echo "hello ".$name;
?>