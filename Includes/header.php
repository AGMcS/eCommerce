<?php

    session_start();

?>

<header id="header" class="header d-flex align-items-center">

<div class="container-fluid container-xl d-flex align-items-center justify-content-between">
    <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/dripTabLogo.png" alt=""> -->
        <h1>Drip<span>Clothing</span></h1>
    </a>

    <!--search bar-->
    <form action="http://localhost/website/index.php#shop" method="get" class="d-flex ms-auto">
        <input class="form-control me-2" name="searchTags" type="search" placeholder="Search" aria-label="Search">
        <button class="btn-search" name="searchSubmit" type="submit"><i class="bi bi-search"></i></button>
    </form>

    <nav id="navbar" class="navbar">
        <ul>
            <li><a href="http://localhost/website/index.php#hero">Home</a></li>
            <li><a href="http://localhost/website/index.php#about">About</a></li>
            <li class="dropdown">
                <a href="#shop"><span>Shop</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                    <li class="dropdown">
                        <a href="?filter=all#shop"><span>Shop All</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <form action="http://localhost/website/index.php" method="get">
                                <li><a href="?filter=MEN#shop" type="submit">Mens</a></li>
                                <li><a href="?filter=WOM#shop" type="submit">Women</a></li>
                                <li><a href="?filter=KID#shop" type="submit">Kids</a></li>
                                <li><a href="?filter=ACC#shop" type="submit">Accessories</a></li>
                            </form>
                        </ul>
                    </li>
                </ul>
            </li>
                <?php
                if (isset($_SESSION["account"]["FirstName"])) {
                    echo '<li class="dropdown">';
                    echo    '<a href="#"><span>'.$_SESSION["account"]["FirstName"], '</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>';
                    echo    '<ul>';
                    echo        '<li><a href="#" data-bs-toggle="modal" data-bs-target="#accountModal">Account</a></li>';
                    echo        '<li><a href="#" data-bs-toggle="modal" data-bs-target="#signOutModal">Sign Out</a></li>';
                    if (isset($_SESSION["account"]["AdminID"])) {
                        echo '<li><a href="http://localhost/website/ticketPage.php">View Tickets</a></li>';
                        echo '<li><a href="http://localhost/website/adminAccountsPage.php">Manage Users</a></li>';
                    }
                    echo    '</ul>';
                    echo '</li>';
                } else {
                    echo "<li>";
                    echo "<a href='#' data-bs-toggle='modal' data-bs-target='#signInModal'>";
                    echo "Sign In";
                    echo "</a>";
                    echo "</li>";
                }
                ?>
            <li>
                <a href="#" data-bs-toggle="modal" data-bs-target="#basketModal">
                    <i class="bi bi-bag"></i><sup><?php echo (isset($_SESSION["cartCount"])) ? $_SESSION["cartCount"] : ""; ?></sup>
                </a>
            </li>
        </ul>
        <!-- Navbar -->
        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    </nav>
</div>
</header>
<!-- End Header -->