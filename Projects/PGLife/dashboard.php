<!DOCTYPE html>
<html lang="en">
    
    <head>
        <title>dashboard | PG Life</title>
        <?php
            include "includes/head_link.php";
        ?>
        <link rel="stylesheet" href="css/dashboard.css">
 
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
        <?php
            include "includes/footer.php";
        ?>

        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        
    </body>
</html>