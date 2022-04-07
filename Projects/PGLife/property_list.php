<?php
    //starting session
    session_start();
    //connecting database
    require "includes/database_connect.php";

    //storing userid from session,if it has
    $user_id= isset($_SESSION['user_id'])?$_SESSION['user_id']:null;
    //storing city searched on home search
    $city_name = $_GET["city"];

    // query to retrive all the properties data located in the $city_name
    $sql = " SELECT * FROM cities WHERE name = '$city_name'";  
    
    // retriving and storing data
    $result = mysqli_query($conn,$sql);

    if (!$result) {
        echo "something went wrong ". mysqli_query();
    }
    $city = mysqli_fetch_assoc($result);
    $city_id=$city['id'];    
    //query to retrieve detail of properties in city_id
    $sql_1="SELECT * from properties where city_id = $city_id";
    $result_1=mysqli_query($conn,$sql_1);
    if (!$result_1) {
        echo "somthing went wrong";
    }
    //fetching all the rows and storing in $properties as an associative array
    $properties = mysqli_fetch_all($result_1,MYSQLI_ASSOC);
    
    //query to fetch interested users in properties
    $sql_2="SELECT * from interested_users_properties iup 
            INNER JOIN properties p on iup.property_id = p.id
            where p.city_id = $city_id ";
    $result_2 = mysqli_query($conn,$sql_2);
    if (!$result_2) {
        echo "something went wrong";
    }
    $interested_users_properties = mysqli_fetch_all($result_2,MYSQLI_ASSOC);
   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Best PG's in <?php echo $city_name;?> | PG Life</title>
    <?php
        include "includes/head_link.php";
    ?>
    <link href="css/property_list.css" rel="stylesheet" />
</head>

<body>  
        <!--    header   -->
        <?php
            include "includes/header.php";
        ?>

        <!--    breadcrumb   -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb py-2">
                <li class="breadcrumb-item">
                    <a href="index.php">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php echo $city_name; ?>
                </li>
            </ol>
        </nav>

        <!--    page container   -->
        <?php
            if (count($properties) > 0) {
            ?>
                <div class="page-container">
                    <div class="filter-bar row justify-content-around">
                        <div class="col-auto" data-toggle="modal" data-target="#filter-modal">
                            <img src="img/filter.png" alt="filter" />
                            <span>Filter</span>
                        </div>
                        <div class="col-auto">
                            <img src="img/desc.png" alt="sort-desc" />
                            <span>Highest rent first</span>
                        </div>
                        <div class="col-auto">
                            <img src="img/asc.png" alt="sort-asc" />
                            <span>Lowest rent first</span>
                        </div>
                    </div>
                    <?php 
                        foreach ($properties as $property) {
                            $property_images = glob("img/properties/" . $property['id'] . "/*");
                            
                        ?>
                        <div class="property-card row">
                            <div class="image-container col-md-4">
                                <img src=" <?= $property_images[0]?> " />
                            </div>
                            <div class="content-container col-md-8">                               
                                <div class="row no-gutters justify-content-between">
                                <?php
                                    $total_rating = ($property['rating_clean']+$property['rating_food']+$property['rating_safety'])/3;
                                    $total_rating = round($total_rating,1);
                                ?>
                                    <div class="star-container" title="<?= $total_rating ?>">
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
                                    <div class="interested-container">
                                        <i class="is-interested-image far fa-heart"></i>
                                        <div class="interested-text">
                                            <span class="interested-user-count">                      
                                            <?php
                                                $interested_users_count = 0;
                                                $is_interested = false;
                                                foreach ($interested_users_properties as $interested_user_property) {
                                                    if ($interested_user_property['property_id'] == $property['id']) {
                                                        $interested_users_count++;

                                                        if ($interested_user_property['user_id'] == $user_id) {
                                                            $is_interested = true;
                                                        }
                                                    }
                                                }

                                                if ($is_interested) {
                                                ?>
                                                    <i class="fas fa-heart"></i>
                                                <?php
                                                } else {
                                                ?>
                                                    <i class="far fa-heart"></i>
                                                <?php
                                                }
                                            ?>
                                            <?= $interested_users_count ?></span> interested
                                        </div>
                                    </div>
                                <div class="detail-container">
                                    <div class="property-name"><?= $property['name']?></div>
                                    <div class="property-address"><?= $property['address']?></div>
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
                                        <div class="rent">Rs <?= number_format($property['rent']) ?>/-</div>
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
            <?php
            }
            if (count($properties) == 0) {
                ?>
                    <div class="no-property-container">
                        <p>No PG to list</p>
                    </div>
                <?php
            }
        ?>

        <!--    filter modal      -->
        <div class="modal fade" id="filter-modal" tabindex="-1" role="dialog" aria-labelledby="filter-heading" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="filter-heading">Filters</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <h5>Gender</h5>
                        <hr />
                        <div>
                            <button class="btn btn-outline-dark btn-active">
                                No Filter
                            </button>
                            <button class="btn btn-outline-dark">
                                <i class="fas fa-venus-mars"></i>Unisex
                            </button>
                            <button class="btn btn-outline-dark">
                                <i class="fas fa-mars"></i>Male
                            </button>
                            <button class="btn btn-outline-dark">
                                <i class="fas fa-venus"></i>Female
                            </button>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-success">Okay</button>
                    </div>
                </div>
            </div>
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
