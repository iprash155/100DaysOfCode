<?php
    $conn = mysqli_connect("127.0.0.1","root","","PGLife");
    // connection error message
    if (mysqli_connect_error()) {
            // Throw error message based on ajax or not
        echo "failed to connect MySql! please contact admin";
        return;
    }
?>