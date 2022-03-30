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
                <form id="search-form" action="property_list.php" method="post">
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
        <div class="page-container">
            <h1 class="city-heading">
                Major Cities
            </h1>
            <div class="row">
                <div class="city-card-container col-md">
                    <a href="property_list.php?city="delhi"">
                        <div class="city-card rounded-circle">
                            <img src="img/delhi.png" class="city-img" />
                        </div>
                    </a>
                </div>

                <div class="city-card-container col-md">
                    <a href="property_list.php?city="mumbai"">
                        <div class="city-card rounded-circle">
                            <img src="img/mumbai.png" class="city-img" />
                        </div>
                    </a>
                </div>

                <div class="city-card-container col-md">
                    <a href="property_list.php?city="bangalore"">
                        <div class="city-card rounded-circle">
                            <img src="img/bangalore.png" class="city-img" />
                        </div>
                    </a>
                </div>

                <div class="city-card-container col-md">
                    <a href="property_list.php?city="hyderabad"">
                        <div class="city-card rounded-circle">
                            <img src="img/hyderabad.png" class="city-img" />
                        </div>
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