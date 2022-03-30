<?php
    //connecting database
    require ("include/database_connect.php");

    //storing city searched on home search
    $city_name = $_POST['city'];

    // query to retrive all the properties data located in the $city_name
    $sql = " SELECT * FROM 
             cities INNER JOIN properties on
             properties.city_id = cities.id 
             WHERE cities.name = "$city_name"
            ";
    
    // retriving and storing data
    $result = mysqli_query($conn,$sql);

    if (mysqli_error()) {
        echo "something went wrong ". mysqli_query();
    }

    //fetching all the rows and storing in $properties as an associative array
    $properties = mysqli_fetch_all($result,MYSQLI_ASSOC);

    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Best PG's in Mumbai | PG Life</title>
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
                    <?php $city_name ?>
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
                            $property_image = glob("img/properties/" . $property['id'] . "/*")
                            
                        ?>
                        <div class="property-card row">
                            <div class="image-container col-md-4">
                                <img src=" <?php $property_image[0]?> " />
                            </div>
                            <div class="content-container col-md-8">
                                <?php
                                    $total_rating = ($property['rating_clean']+$property['rating_food']+$property['rating_safety'])/3;
                                    $total_rating = round($total_rating,1);
                                ?>
                                <div class="row no-gutters justify-content-between">
                                    <div class="star-container" title="<?= $total_rating ?>">
                                        <?php
                                            $rating = $total_rating;
                                            for ($i=0; $i <5; $i++) { 

                                            if ($rating >= i+0.8) {?>
                                                <i class="fas fa-star"></i>

                                            <?php } 
                                            else if ($rating >= i+0.3) {?>

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
                                        <i class="far fa-heart"></i>
                                        <div class="interested-text">
                                        <?php
                                            //sql query to retrive no of users interested in perticular property for showing no of likes on property card in page container
                                            $sql_1 = " SELECT user_id from 
                                                        interested_users_properties iup inner join properties p
                                                        on iup.user_id = properties.id 
                                                        where iup.property_id = $property['id'] ";
                                                        
                                            //retriving and storing data     
                                            $result_1 = mysqli_query($conn,$sql_1);

                                            if (mysqli_error()) {
                                                echo "something went wrong ". mysqli_query();
                                            }
                                            
                                            $no_of_users = mysqli_num_row($result_1);
                                            if ($no_of_users>0) {
                                                echo $no_of_users?> interested</div>.
                                            <?php
                                            }
                                        ?>
                                                    
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
                                        <?php $_SESSION['property_id']=$property['id'];?>
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

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>

</html>
