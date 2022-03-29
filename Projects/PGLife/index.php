<!DOCTYPE html>
<html lang="en">

    <head>

        <title> welcome | PG Life</title>
        <?php
            include "includes/head_link.php";
        ?>
        <link rel="stylesheet" href="css/index.css">

    </head>

    <body>
        
        <!-- header navbar -->
        <?php
            include "includes/header.php";
        ?>      
        
        <!-- banner container -->
        <div class="banner-container">
                
                <h2 class="white pb-3">Happiness Per Square Foot</h2>
                <form id="search-form" action="" method="post">
                    <div class="input-group city-search">
                        <input type="text" class=" form-control input-city" id="city" name="city" placeholder="enter your city to search for pg ">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">
                                <i class="fa fa-search"></i>     <!-- search symbol from font awesomecssfile -->
                            </button>
                        </div>
                    </div>
                </form>          
            
        </div>
        
        <!--  page container     -->
        <div class="page-container ">
            
            <h1 >Major Cities</h1>
            <div class="row cities">
                <div class="col-md-auto" id="DELHI">
                    <a href="property_list.php?city="delhi"">
                        <img class="city-image" src="img/delhi.png" alt="delhi">
                    </a>
                </div>
                <div class="col-md-auto" id="MUMBAI">
                    <a href="property_list.php?city="mumbai"">
                        <img class="city-image" src="img/mumbai.png" alt="mumbai">
                    </a>
                </div>
                <div class="col-md-auto" id="BENGALURU">
                    <a href="property_list.php?city="bangalore"">
                        <img class="city-image" src="img/bangalore.png" alt="bangalore">
                    </a>
                </div>
                <div class="col-md-auto" id="HYDERABAD">
                    <a href="property_list.php?city="hyderabad"">
                        <img class="city-image" src="img/hyderabad.png" alt="hyderabad">
                    </a>
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