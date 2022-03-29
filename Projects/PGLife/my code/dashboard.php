<!DOCTYPE html>
<html lang="en">
    <head>
        <title>dashboard | PG Life</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="css/dashboard.css">
        <!-- for using icons -->
        <link  href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" rel="stylesheet" >
        <!-- for font-family : open sans -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet" />
    
    </head>

    <body>

        <!--    header navbar    -->
        <?php
            include 'includes/header.php';
        ?>


        <!--    breadcrumb      -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb py-2">
                <li class="breadcrumb-item">
                    <a href="index.php">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    DashBoard
                </li>
            </ol>
        </nav>

        <!--    page container  -->
        <div class="page-container">
            
            <div class="row">
                <h1>My Profile</h1>
            </div>
                
            <div class="row profile-detail">

                <!-- user logo -->
                <div class="col-sm-4 user-logo">
                    <i class="fas fa-user"></i>
                </div>

                <!-- user detail    -->
                <div class="col-sm-6 profile-description">                    
                        <div class="row user-name">
                                <h3>Prashant</h3>
                        </div>
                        
                        <div class="user-address">
                            <p>Lambi oty, </p>                            
                            <p>valand vado,</p>                            
                            <p>khambhat-388620 </p>
                        </div>
                        
                        <div class="row internshala">
                            <h4>internshala</h4>
                        </div>                    
                </div>    
                
                <!--  Edit profile link-->
                <div class="col-auto edit-profile">
                    <a href="#">Edit-Profile</a>
                </div>

            </div>

        </div>
        

        <!--         footer         -->
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