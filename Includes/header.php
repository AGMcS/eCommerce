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
    <form action="#" method="get" class="d-flex ms-auto">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn-search" type="submit"><i class="bi bi-search"></i></button>
    </form>

    <nav id="navbar" class="navbar">
        <ul>
            <li><a href="#hero">Home</a></li>
            <li><a href="#about">About</a></li>
            <li class="dropdown">
                <a href="#shop"><span>Shop</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                    <li class="dropdown">
                        <a href="#shop"><span>Shop All</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li><a href="#mensFilter">Mens</a></li>
                            <li><a href="#womensFilter">Women</a></li>
                            <li><a href="#kidsFilter">Kids</a></li>
                            <li><a href="#accessoriesFilter">Accessories</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
                <?php
                if (isset($_SESSION["userName"])) {
                    echo '<li class="dropdown">';
                    echo    '<a href="#shop"><span>'.$_SESSION["userName"], '</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>';
                    echo    '<ul>';
                    echo        '<li><a href="#">Account</a></li>';
                    echo        '<li><a href="#" data-bs-toggle="modal" data-bs-target="#signOutModal">Sign Out</a></li>';
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
                    <i class="bi bi-bag"></i>
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