<?php
    //starting sessoin
    session_start();

    //accessign session
    if (isset($_SESSION['user_id'])) {
        $user_id=$_SESSION['user_id'];
        $name=$_SESSION['name'];
        echo "hello ".$name;
        
        //logout
        ?>
        <a href="logout.php">logout</a>
        <?php
        
    }

    //accessing cookie
    // $user_id=$_COOKIE['user_id'];
    // $name=$_COOKIE['name'];



?>