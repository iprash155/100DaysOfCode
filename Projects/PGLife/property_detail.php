<?php   
    session_start();
    //connecting database
    require("includes/database_connect.php");

    //storing property id
    $property_id = $_GET["property_id"];
    //storing user_id in $user_id from session if it has
    $user_id=isset($_SESSION['user_id'])?$_SESSION['user_id']:null;

    // retriving details from properties table for particular id
    $sql = " SELECT * from properties where id = $property_id";

    $result = mysqli_query($conn,$sql);
    if (!$result) {
        echo "something went wrong";
        return;
    }
    //fetching and storing whole row in $property as an associative array
    $property = mysqli_fetch_assoc($result);
    if (!$property) {
        echo "Something went wrong!";
        return;
    }
    //query to retrive all testimonials for $property_id
    $sql_1 = "SELECT * from testimonials inner join properties on testimonials.property_id = properties.id where properties.id = $property_id";
    $result_1 = mysqli_query($conn,$sql_1);
    if (!$result_1) {
        echo "something went wrong";
        return;
    }
    //fetchig all the testimonial rows in $testimonial as an associative array
    $testimonials = mysqli_fetch_all($result_1,MYSQLI_ASSOC);


    //query to fetch amenities
    $sql_2 = "SELECT * from 
              amenities a inner join properties_amenities pa
              on pa.amenity_id = a.id 
              where pa.property_id = $property_id            
             ";
    $result_2 = mysqli_query($conn,$sql_2);
    if (!$result_2) {
        echo "something went wrong";
        return;
    }
    //fetching and storing all the amenities property have in an associative array
    $amenities = mysqli_fetch_all($result_2,MYSQLI_ASSOC);
    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $property['name']; ?>  | PG Life</title>
    <?php
            include "includes/head_link.php";
    ?>
    <link href="css/property_detail.css" rel="stylesheet" />
</head>

<body>

        <!--header-->
        <?php
            include "includes/header.php";
        ?>

        <!--breadcrumb-->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb py-2">
                <li class="breadcrumb-item">
                    <a href="index.php">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <?php 
                        require ("includes/database_connect.php");
                        //query to retrive current city 
                        $sql_3 = " SELECT cities.name from 
                                 cities inner join properties on
                                 properties.city_id = cities.id 
                                 where properties.id = $property_id";
                        $result_3 = mysqli_query($conn,$sql_3);
                        if (!$result_3) {
                            echo "something went wrong";
                        } 
                        $city = mysqli_fetch_assoc($result_3);
                    ?>
                    <a href="property_list.php?city=<?= $city['name'];?>"><?= $city['name']?></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?= $property['name'];?>
                </li>
            </ol>
        </nav>

        <!--    carousel    -->
        <div id="property-images" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#property-images" data-slide-to="0" class="active"></li>
                <li data-target="#property-images" data-slide-to="1" class=""></li>
                <li data-target="#property-images" data-slide-to="2" class=""></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="img/properties/1/1d4f0757fdb86d5f.jpg" alt="slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/properties/1/46ebbb537aa9fb0a.jpg" alt="slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/properties/1/eace7b9114fd6046.jpg" alt="slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#property-images" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#property-images" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="property-summary page-container">
            <div class="row no-gutters justify-content-between">
                <?php $total_rating = ($property['rating_food']+$property['rating_food']+$property['rating_food'])/3;
                        $total_rating = round($total_rating,1);?>
                <div class="star-container" title="<?=$total_rating?>">
                    <?php
                        $rating = $total_rating;
                        for ($i=0; $i <5 ; $i++) { 
                            if ($rating >= $i+0.8) {
                            ?>
                                <i class="fas fa-star"></i>
                            <?php
                            } elseif ($rating >= $i+0.3) {
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
                
                            <?php
                                $is_interested=false;
                                $interested_users_count=0;
                                require "includes/database_connect.php";
                                //sql query to retrive no of users interested in perticular property for showing no of likes on property card in page container
                                $sql_4 = " SELECT user_id from 
                                            interested_users_properties iup inner join properties p
                                            on iup.property_id = p.id 
                                            where iup.property_id = $property_id ";
                                            
                                //retriving and storing data     
                                $result_4 = mysqli_query($conn,$sql_4);

                                if (!$result_4) {
                                    echo "something went wrong ". mysqli_query();
                                }

                                $users = mysqli_fetch_all($result_4,MYSQLI_ASSOC);
                                $interested_users_count = mysqli_num_rows($result_4);
                                
                                foreach ($users as $id) {
                                    if ($id==$user_id) {
                                        $is_interested=true;    
                                    }
                                }
                                
                                if ($is_interested) {?>
                                    <i class="is-interested-image fas fa-heart"></i>
                                    <?php
                                }
                                else { ?>
                                    <i class="is-interested-image far fa-heart"></i>
                                    <?php
                                }                       
                            ?>
                        <div class="interested-text">
                            <span class="interested-user-count"><?= $interested_users_count ?></span> interested
                        </div>
                </div>
            </div>
            <div class="detail-container">
                <div class="property-name"><?= $property['name'] ?></div>
                <div class="property-address"><?= $property['address'] ?></div>
                <div class="property-gender">
                <?php 
                    if ($property['gender']=="male") {?>
                        <img src="img/male.png" />
                    <?php } elseif ($property['gender']=="female"){?>
                        <img src="img/female.png" />
                    <?php } else { ?>
                        <img src="img/unisex.png" />
                    <?php
                    }
                ?> 
                </div>
            </div>
            <div class="row no-gutters">
                <div class="rent-container col-6">
                    <div class="rent">Rs <?= number_format($property['rent'])?>/-</div>
                    <div class="rent-unit">per month</div>
                </div>
                <div class="button-container col-6">
                    <a href="#" class="btn btn-primary">Book Now</a>
                </div>
            </div>
        </div>

        <div class="property-amenities">
            <div class="page-container">
                <h1>Amenities</h1>
                <div class="row justify-content-between">
                    <div class="col-md-auto">
                        <h5>Building</h5>
                        <?php
                        foreach ($amenities as $amenity) {
                            if ($amenity['type'] == "Building") {
                        ?>
                                <div class="amenity-container">
                                    <img src="img/amenities/<?= $amenity['icon'] ?>.svg">
                                    <span><?= $amenity['name'] ?></span>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>

                    <div class="col-md-auto">
                        <h5>Common Area</h5>
                        <?php
                        foreach ($amenities as $amenity) {
                            if ($amenity['type'] == "Common Area") {
                        ?>
                                <div class="amenity-container">
                                    <img src="img/amenities/<?= $amenity['icon'] ?>.svg">
                                    <span><?= $amenity['name'] ?></span>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>

                    <div class="col-md-auto">
                        <h5>Bedroom</h5>
                        <?php
                        foreach ($amenities as $amenity) {
                            if ($amenity['type'] == "Bedroom") {
                        ?>
                                <div class="amenity-container">
                                    <img src="img/amenities/<?= $amenity['icon'] ?>.svg">
                                    <span><?= $amenity['name'] ?></span>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>

                    <div class="col-md-auto">
                        <h5>Washroom</h5>
                        <?php
                        foreach ($amenities as $amenity) {
                            if ($amenity['type'] == "Washroom") {
                        ?>
                                <div class="amenity-container">
                                    <img src="img/amenities/<?= $amenity['icon'] ?>.svg">
                                    <span><?= $amenity['name'] ?></span>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>


        <div class="property-about page-container">
            <h1>About the Property</h1>
            <p><?=  $property['description'] ?></p>
        </div>

        <div class="property-rating">
            <div class="page-container">
                <h1>Property Rating</h1>
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-6">
                        <div class="rating-criteria row">
                            <div class="col-6">
                                <i class="rating-criteria-icon fas fa-broom"></i>
                                <span class="rating-criteria-text">Cleanliness</span>
                            </div>
                            <div class="rating-criteria-star-container col-6" title="<?= $property['rating_clean']?>">
                                <?php
                                    $rating = $property['rating_clean'];
                                    for ($i=0; $i <5; $i++) { 

                                    if ($rating >= $i+0.8) {?>
                                        <i class="fas fa-star"></i>

                                    <?php } 
                                    else if ($rating >= $i+0.3) {?>

                                        <i class="fas fa-star-half-alt"></i>

                                    <?php }
                                    else { ?>
                                        <i class="far fa-star"></i>
                                    <?php
                                    }                             
                                    }
                                ?>
                            </div>
                        </div>

                        <div class="rating-criteria row">
                            <div class="col-6">
                                <i class="rating-criteria-icon fas fa-utensils"></i>
                                <span class="rating-criteria-text">Food Quality</span>
                            </div>
                            <div class="rating-criteria-star-container col-6" title="<?= $property['rating_food']?>">
                                <?php
                                        $rating = $property['rating_food'];
                                        for ($i=0; $i <5; $i++) { 

                                        if ($rating >= $i+0.8) {?>
                                            <i class="fas fa-star"></i>

                                        <?php } 
                                        else if ($rating >= $i+0.3) {?>

                                            <i class="fas fa-star-half-alt"></i>

                                        <?php }
                                        else { ?>
                                            <i class="far fa-star"></i>
                                        <?php
                                        }                             
                                        }
                                    ?>
                            </div>
                        </div>

                        <div class="rating-criteria row">
                            <div class="col-6">
                                <i class="rating-criteria-icon fa fa-lock"></i>
                                <span class="rating-criteria-text">Safety</span>
                            </div>
                            <div class="rating-criteria-star-container col-6" title="<?= $property['rating_safety']?>">
                                <?php
                                        $rating = $property['rating_safety'];
                                        for ($i=0; $i <5; $i++) { 

                                        if ($rating >= $i+0.8) {?>
                                            <i class="fas fa-star"></i>

                                        <?php } 
                                        else if ($rating >= $i+0.3) {?>

                                            <i class="fas fa-star-half-alt"></i>

                                        <?php }
                                        else { ?>
                                            <i class="far fa-star"></i>
                                        <?php
                                        }                             
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="rating-circle">
                            <?php
                                $total_rating = ($property['rating_clean']+$property['rating_food']+$property['rating_safety'])/3;
                                $total_rating = round($total_rating,1);
                            ?>
                            <div class="total-rating"><?= $total_rating ?></div>
                            <div class="rating-circle-star-container">
                                <?php
                                    $rating = $total_rating;
                                    for ($i=0; $i <5; $i++) { 

                                    if ($rating >= $i+0.8) {?>
                                        <i class="fas fa-star"></i>

                                    <?php } 
                                    else if ($rating >= $i+0.3) {?>

                                        <i class="fas fa-star-half-alt"></i>

                                    <?php }
                                    else { ?>
                                        <i class="far fa-star"></i>
                                    <?php
                                    }                             
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="property-testimonials page-container">
            <h1>What people say</h1>
            <?php
            foreach ($testimonials as $testimonial) {
            ?>
                <div class="testimonial-block">
                    <div class="testimonial-image-container">
                        <img class="testimonial-img" src="img/man.png">
                    </div>
                    <div class="testimonial-text">
                        <i class="fa fa-quote-left" aria-hidden="true"></i>
                        <p><?= $testimonial['content'] ?></p>
                    </div>
                    <div class="testimonial-name">- <?= $testimonial['user_name'] ?></div>
                </div>
            <?php
            }
            ?>
        </div> 

        <!--    sign-up modal    -->
        <?php
            include "includes/signup_modal.php";
        ?>

        <!--    log-in modal    -->
        <?php
            include "includes/login_modal.php";
        ?>

        <!-- footer -->
        <?php
            include "includes/footer.php";
        ?>

</body>

</html>
