<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Drip Clothing - Checkout</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/dripTabLogo.png" rel="icon">
    <link href="assets/img/dripTabLogo.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Impact - v1.2.0
    * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->

    

    <?php
        include("Includes/header.php");
    ?>
    <!-- End Header -->

    <!-- Modals -->
    <?php
        include("Includes/modals.php");
    ?>

    <!-- ======= Hero Section ======= -->
    <section id="checkout-hero" class="hero-alt">
        <div class="container" data-aos="fade-down">
            <h2>User Management</h2>
        </div>

    </section>
    <!-- End Hero Section -->

    <main id="main">

        <!-- Ticket Table Section ======= -->

        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h2 class="mb-4">Account List</h2>


                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="row g-3 align-items-center mb-4">
                                    <div class="col-auto">
                                        <label for="userSearch" class="col-form-label">For a specific account, please enter the full name, email, or account ID: </label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" id="userSearch" name="userSearch" class="form-control">
                                    </div>
                                    <div class="col-auto">
                                        <input type="submit" class="btn btn-success" name="userSearchSubmit" value="Search">
                                    </div>
                                </div>
                            </form>


                    <table class="table table-dark table-striped">

                        <thead>
                            <tr>
                                <form name="filterForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                    <th scope="col"><button style="background: none; border: none; font-weight: 800;" class="text-light" type="submit" name="filter" value="default">#</button></th>
                                    <th scope="col"><button style="background: none; border: none; font-weight: 800;" class="text-light" type="submit" name="filter" value="account">Account ID</button></th>
                                    <th scope="col"><button style="background: none; border: none; font-weight: 800;" class="text-light" type="submit" name="filter" value="name">Name</button></th>
                                    <th scope="col"><button style="background: none; border: none; font-weight: 800;" class="text-light" type="submit" name="filter" value="street">Street</button></th>
                                    <th scope="col"><button style="background: none; border: none; font-weight: 800;" class="text-light" type="submit" name="filter" value="city">Town/City</button></th>
                                    <th scope="col"><button style="background: none; border: none; font-weight: 800;" class="text-light" type="submit" name="filter" value="country">Country</button></th>
                                    <th scope="col"><button style="background: none; border: none; font-weight: 800;" class="text-light" type="submit" name="filter" value="postcode">Postcode</button></th>
                                    <th scope="col"><button style="background: none; border: none; font-weight: 800;" class="text-light" type="submit" name="filter" value="email">Email</button></th>
                                </form>
                            </tr>
                        </thead>

                        <?php
                            include("Includes/portfolio.php");
                            if (isset($_POST["filter"])) {

                                switch ($_POST["filter"]) {
                                    case "account":
                                        displayUsers("ORDER BY AccountID");
                                        break;
                                    case "name":
                                        displayUsers("ORDER BY FirstName");
                                        break;
                                    case "street":
                                        displayUsers("ORDER BY Street");
                                        break;
                                    case "city":
                                        displayUsers("ORDER BY City");
                                        break;
                                    case "country":
                                        displayUsers("ORDER BY Country");
                                        break;
                                    case "postcode":
                                        displayUsers("ORDER BY Postcode");
                                        break;
                                    case "email":
                                        displayUsers("ORDER BY Email");
                                        break;
                                    case "default":
                                        displayUsers("");
                                        break;
                                }
                            } else if (isset($_POST["userSearchSubmit"])){
                                displayUsers("WHERE AccountID = '".$_POST["userSearch"]."' OR CONCAT(FirstName, ' ', LastName) = '".$_POST["userSearch"]."' OR Email = '".$_POST["userSearch"]."'");
                            } else {
                                displayUsers("");
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>

    </main> <!-- End Main Section-->
    <!-- ======= Footer ======= -->

    <?php
        include("Includes/footer.php");
    ?>
    
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>