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

    <!-- ======= Modal ======= -->

    <?php
        include("Includes/modals.php");
    ?>
    <!-- End Modal -->

    <!-- ======= Hero Section ======= -->
    <section id="checkout-hero" class="hero-alt">
        <div class="container" data-aos="fade-down">
            <h2>Register</h2>
        </div>

    </section>
    <!-- End Hero Section -->

    <main id="main">

        <!-- Register Section ======= -->
        <section id="register" class="main">
            <div class="container" data-aos="fade-up">

                <div class="container">

                    <div class="row">
                        <div class="col-md-8">
                            <h2 class="mb-4">Account Creation</h2>

                            <form action="http://localhost/website/Includes/register.php" method="post">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="inputFirstName" class="form-label">First Name</label>
                                        <input type="text" name="register[firstName]" class="form-control" id="inputFirstName">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputLastName" class="form-label">Last Name</label>
                                        <input type="text" name="register[lastName]" class="form-control" id="inputLastName">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="inputAddress" class="form-label">Address</label>
                                    <input type="text" name="register[street]" class="form-control" id="inputAddress">
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="inputCity" class="form-label">City</label>
                                        <input type="text" name="register[city]" class="form-control" id="inputCity">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputCountry" class="form-label">Country</label>
                                        <select id="inputCountry" name="register[country]" class="form-select">
                                            <option value="">Choose...</option>
                                            <option value="England">England</option>
                                            <option value="Scotland">Scotland</option>
                                            <option value="Northern Ireland">Northern Ireland</option>
                                            <option value="Wales">Wales</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">

                                    <div class="col-md-6">
                                        <label for="inputZip" class="form-label">Zip</label>
                                        <input type="text" name="register[postcode]" class="form-control" id="inputZip">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputEmail" class="form-label">Email</label>
                                        <input type="email" name="register[email]" class="form-control" id="inputEmail">
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="registerPassword" class="form-label">Password</label>
                                        <input type="password" name="register[password]" id="registerPassword" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="registerConfirmPassword" class="form-label">Confirm Password</label>
                                        <input type="password" name="register[confirmPassword]" id="registerConfirmPassword" class="form-control">
                                    </div>
                                </div>

                                <div class="row-mb-3">
                                    <button type="submit" name="registerSubmit" class="btn btn-primary">Register</button>
                                </div>

                                <hr class="hr-splitter">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End About Us Section -->

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
