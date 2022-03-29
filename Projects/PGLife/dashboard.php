<?php
    //starting session
    session_start();
    //connecting database
    require("../includes/database_connect.php");
    //checking if user has loged-in or not, if not landing on index.php
    if (!isset($_SESSION['user_id'])) {
        header("location:index.php");
        die();
    }

    $user_id = $_SESSION['user_id'];

    // query to retrive user data row for $user_id
    $sql_1 = "SELECT * FROM users where id=$user_id ";
    //storing and retriving row
    $result_1 = mysqli_query($conn,$sql_1);
    if (mysqli_error()) {
        echo "something went wrong";
    }
    //fetching resulted row in $user associative array where key will be column name
    $user = mysqli_fetch_assoc($result_1);
    if (!$user) {
        echo "something went wrong";
    }

    //query to retrive all the data of user's interersted property
    $sql_2 = "SELECT * FROM 
            interested_users_properties iup inner join properties p 
            on iup.property_id = p.id 
            where iup.user_id = $user_id ";

    //storing and retriving rows  
    $result_2 = mysqli_query($conn,$sql_2);
    //fetching all resulted rows in $interersted_properties associative array
    $interested_properties = mysqli_fetch_all($result_2, MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <title>Dashboard | PG Life</title>
    <?php
        include "includes/head_link.php";
    ?>
    <link href="css/dashboard.css" rel="stylesheet" />
</head>

<body>
    <?php
        include "includes/header.php";
    ?>
    <div id="loading">
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb py-2">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Dashboard
            </li>
        </ol>
    </nav>

    <div class="my-profile page-container">
        <h1>My Profile</h1>
        <div class="row">
            <div class="col-md-3 profile-img-container">
                <i class="fas fa-user profile-img"></i>
            </div>
            <div class="col-md-9">
                <div class="row no-gutters justify-content-between align-items-end">
                    <div class="profile">
                        <div class="name"><?php $user['full_name']; ?></div>
                        <div class="email"><?php $user['email']; ?></div>
                        <div class="phone"><?php $user['phone']; ?></div>
                        <div class="college"><?php $user['college_name']; ?></div>
                    </div>
                    <div class="edit">
                        <div class="edit-profile">Edit Profile</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        if (count($interested_properties > 0)) {
    ?>
        <div class="my-interested-properties">
            <div class="page-container">
                <h1>My Interested Properties</h1>

                <?php
                foreach ($interested_properties as property) {
                    $property_image = glob("img/properties/". $property['id'] ."/*");
                ?>
                    <div class="property-card property-id-<?php $property['id']?> row">
                        <div class="image-container col-md-4">
                            <img src="<?php $property_image['0'] ?> " />
                        </div>
                        <div class="content-container col-md-8">
                            <div class="row no-gutters justify-content-between">
                                <?php
                                    $total_ratings = ($property['rating_clean']+$property['rating_food']+$property['rating_safety'])/3;
                                    $total_ratings = round($total_ratings,1);
                                ?>
                                    <div class="star-container" title="<?php $total_ratings ?>">
                                        <?php
                                            $rating = $total_ratings;
                                            for ($i=0; $i <5 ; $i++) { 
                                                if ($rating >= i+0.8) {
                                                ?>
                                                    <i class="fas fa-star"></i>
                                                <?php
                                                } elseif ($rating >= i+0.3) {
                                                ?>
                                                    <i class="fas fa-star-half-alt"></i>
                                                <?php
                                                } else {   
                                                ?>
                                                    <i class="far fa-star"></i>
                                                <?php
                                                }                      
                                            }
                                            ?>
                                    </div>
                                    <div class="interested-container">
                                        <i class="is-interested-image fas fa-heart" property_id="<?php $property['id']?>"></i>
                                    </div>
                            </div>
                            <div class="detail-container">
                                <div class="property-name"><?= $property['name'] ?></div>
                                <div class="property-address"><?= $property['address'] ?></div>
                                <div class="property-gender">
                                    <?php if ($property['gender']=="male") {
                                    ?> <img src="img/male.png">
                                    <?php
                                    } elseif ($property['gender']=="female") {
                                    ?> <img src="img/female.png">
                                    <?php
                                      } else{
                                    ?> <img src="img/unisex.png">
                                    <?php    
                                      }
                                    ?>                                    
                                </div>
                            </div>
                            <div class="row no-gutters">
                                <div class="rent-container col-6">
                                    <div class="rent">rs<?= number_format($property['rent'])?>/-</div>
                                    <div class="rent-unit">per month</div>
                                </div>
                                <div class="button-container col-6">
                                    <a href="property_detail.php?property_id=<?= $property['id'] ?>" class="btn btn-primary">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    <?php }
    ?>


    <div class="footer">
        <div class="page-container footer-container">
            <div class="footer-cities">
                <div class="footer-city">
                    <a href="property_list.html">PG in Delhi</a>
                </div>
                <div class="footer-city">
                    <a href="property_list.html">PG in Mumbai</a>
                </div>
                <div class="footer-city">
                    <a href="property_list.html">PG in Bangalore</a>
                </div>
                <div class="footer-city">
                    <a href="property_list.html">PG in Hyderabad</a>
                </div>
            </div>
            <div class="footer-copyright">© 2020 Copyright PG Life </div>
        </div>
    </div>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

</html>
