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
        <?php
            include "includes/header.php";
        ?>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb py-2">
                <li class="breadcrumb-item">
                    <a href="index.php">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Mumbai
                </li>
            </ol>
        </nav>

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

            
            <div class="property-card row">
                <div class="image-container col-md-4">
                    <img src="img/properties/1/1d4f0757fdb86d5f.jpg" />
                </div>
                <div class="content-container col-md-8">
                    <div class="row no-gutters justify-content-between">
                        <div class="star-container" title="4.5">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <div class="interested-container">
                            <i class="far fa-heart"></i>
                            <div class="interested-text">3 interested</div>
                        </div>
                    </div>
                    <div class="detail-container">
                        <div class="property-name">Navkar Paying Guest</div>
                        <div class="property-address">44, Juhu Scheme, Juhu, Mumbai, Maharashtra 400058</div>
                        <div class="property-gender">
                            <img src="img/male.png" />
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="rent-container col-6">
                            <div class="rent">Rs 9,500/-</div>
                            <div class="rent-unit">per month</div>
                        </div>
                        <div class="button-container col-6">
                            <a href="property_detail.php" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="property-card row">
                <div class="image-container col-md-4">
                    <img src="img/properties/1/eace7b9114fd6046.jpg" />
                </div>
                <div class="content-container col-md-8">
                    <div class="row no-gutters justify-content-between">
                        <div class="star-container" title="4.8">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="interested-container">
                            <i class="far fa-heart"></i>
                            <div class="interested-text">6 interested</div>
                        </div>
                    </div>
                    <div class="detail-container">
                        <div class="property-name">Ganpati Paying Guest</div>
                        <div class="property-address">Police Beat, Sainath Complex, Besides, SV Rd, Daulat Nagar, Borivali East, Mumbai - 400066</div>
                        <div class="property-gender">
                            <img src="img/unisex.png" />
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="rent-container col-6">
                            <div class="rent">Rs 8,500/-</div>
                            <div class="rent-unit">per month</div>
                        </div>
                        <div class="button-container col-6">
                            <a href="property_detail.php" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="property-card row">
                <div class="image-container col-md-4">
                    <img src="img/properties/1/46ebbb537aa9fb0a.jpg" />
                </div>
                <div class="content-container col-md-8">
                    <div class="row no-gutters justify-content-between">
                        <div class="star-container" title="3.5">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <div class="interested-container">
                            <i class="far fa-heart"></i>
                            <div class="interested-text">2 interested</div>
                        </div>
                    </div>
                    <div class="detail-container">
                        <div class="property-name">PG for Girls Borivali West</div>
                        <div class="property-address">Plot no.258/D4, Gorai no.2, Borivali West, Mumbai, Maharashtra 400092</div>
                        <div class="property-gender">
                            <img src="img/female.png" />
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="rent-container col-6">
                            <div class="rent">Rs 8,000/-</div>
                            <div class="rent-unit">per month</div>
                        </div>
                        <div class="button-container col-6">
                            <a href="property_detail.php" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
