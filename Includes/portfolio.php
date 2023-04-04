 <!-- ======= Portfolio Section ======= -->
 

<?php

    function displayClothes($filter) {
        $sqlConnection = mysqli_connect("localhost:3306", "root", "", "dummyForm");

        if (mysqli_connect_errno()) {
            printf("Connection to DB failed: %s \n", mysqli_connect_error());
        } else {
            $query = "SELECT * FROM product WHERE ProductID LIKE '%{$filter}%'";
            $res = mysqli_query($sqlConnection, $query);
            
            while($array = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                $name = $array["Name"];
                $price = $array["Price"];
                $image = $array["ImagePath"];
                $description = $array["Description"];

                echo "<div class='col-xl-4 col-md-6 portfolio-item filter-mens'>";
                echo "<div class='portfolio-wrap'>";
                echo "<a href='$image' data-gallery='portfolio-gallery-app' class='glightbox'><img src='$image' class='img-fluid' alt=''></a>";
                echo "<div class='portfolio-info'>";
                echo "<h4><a href='portfolio-details.html' title='More Details'>'$name'</a></h4>";
                echo "<p>'$description'</p>";
                echo "</div></div></div>";
            }
            
        }
    }
?>

<?php
    function displayTickets() {
        $sqlConnection = mysqli_connect("localhost:3306", "root", "", "dummyForm");
        $query = "SELECT * from userQueries ORDER BY queryDate";
        $res = mysqli_query($sqlConnection, $query);

        if ($res) {
            while($array = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                static $count;
                $count++;

                $name = $array["Name"];
                $email = $array["Email"];
                $subject = $array["Subject"];
                $message = $array["Message"];
                $date = $array["queryDate"];
                $time = $array["time"];

                if($count % 2 == 0) {
                    $class = "style='background-color: #D3D3D3'";
                } else {
                    $class="";
                }

                echo "<tr ".$class.">";
                echo "<td>'$name'</td>";
                echo "<td>'$email'</td>";
                echo "<td><b><a href='#' data-bs-toggle='modal' data-bs-target='#".$message."Modal'>'$subject'</a></b></td>";
                echo "<td>'$date'</td>";
                echo "<td>'$time'</td>";
                echo "</tr>";
                ?>

                <div class="modal fade" id="<?php echo $message."Modal"; ?>" tabindex="-1" aria-labelledby="signOutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signOutModalLabel">Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="http://localhost/website/Includes/logout.php" method="post">
                        <div class="mb-3 text-center">
                            <p><?php echo $message; ?></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
            }
        }
        mysqli_close($sqlConnection);
    }
?>

                        <!-- Mens Items-->

                        <!-- <div class="col-xl-4 col-md-6 portfolio-item filter-mens">
                            <div class="portfolio-wrap">
                                <a href="assets/img/products/mens/mensTeeWhite1.png" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets/img/products/mens/mensTeeWhite1.png" class="img-fluid" alt=""></a>
                                <div class="portfolio-info">
                                    <h4><a href="portfolio-details.html" title="More Details">Men's White Longsleeve</a></h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 portfolio-item filter-mens">
                            <div class="portfolio-wrap">
                                <a href="assets/img/products/mens/mensJacketBlack1.png" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets/img/products/mens/mensJacketBlack1.png" class="img-fluid" alt=""></a>
                                <div class="portfolio-info">
                                    <h4><a href="portfolio-details.html" title="More Details">Men's Black Jacket</a></h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 portfolio-item filter-mens">
                            <div class="portfolio-wrap">
                                <a href="assets/img/products/mens/mensFleece1.png" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets/img/products/mens/mensFleece1.png" class="img-fluid" alt=""></a>
                                <div class="portfolio-info">
                                    <h4><a href="portfolio-details.html" title="More Details">Men's Fleece</a></h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 portfolio-item filter-mens">
                            <div class="portfolio-wrap">
                                <a href="assets/img/products/mens/mensJumperYell.png" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets/img/products/mens/mensJumperYell.png" class="img-fluid" alt=""></a>
                                <div class="portfolio-info">
                                    <h4><a href="portfolio-details.html" title="More Details">Men's Yellow Jumper</a></h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                </div>
                            </div>
                        </div> -->

                        

                        <!-- <div class="col-xl-4 col-md-6 portfolio-item filter-womens">
                            <div class="portfolio-wrap">
                                <a href="assets/img/products/womens/womensTeeLilac1.png" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets/img/products/womens/womensTeeLilac1.png" class="img-fluid" alt=""></a>
                                <div class="portfolio-info">
                                    <h4><a href="portfolio-details.html" title="More Details">Women's T-shirt</a></h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 portfolio-item filter-womens">
                            <div class="portfolio-wrap">
                                <a href="assets/img/products/womens/womensFleeceOrange1.png" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets/img/products/womens/womensFleeceOrange1.png" class="img-fluid" alt=""></a>
                                <div class="portfolio-info">
                                    <h4><a href="portfolio-details.html" title="More Details">Women's Fleece Orange</a></h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 portfolio-item filter-womens">
                            <div class="portfolio-wrap">
                                <a href="assets/img/products/womens/womensJacketBlack1.png" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets/img/products/womens/womensJacketBlack1.png" class="img-fluid" alt=""></a>
                                <div class="portfolio-info">
                                    <h4><a href="portfolio-details.html" title="More Details">Women's Black Jacket</a></h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 portfolio-item filter-kids">
                            <div class="portfolio-wrap">
                                <a href="assets\img\products\kids\kidsTeeWhite1.png" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets\img\products\kids\kidsTeeWhite1.png" class="img-fluid" alt=""></a>
                                <div class="portfolio-info">
                                    <h4><a href="portfolio-details.html" title="More Details">Kid's White T-Shirt</a></h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 portfolio-item filter-kids">
                            <div class="portfolio-wrap">
                                <a href="assets\img\products\kids\kidsJacketBlack1.png" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets\img\products\kids\kidsJacketBlack1.png" class="img-fluid" alt=""></a>
                                <div class="portfolio-info">
                                    <h4><a href="portfolio-details.html" title="More Details">Kid's Black Jacket</a></h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 portfolio-item filter-kids">
                            <div class="portfolio-wrap">
                                <a href="assets\img\products\kids\kidsHoodieTeal2.png" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets\img\products\kids\kidsHoodieTeal2.png" class="img-fluid" alt=""></a>
                                <div class="portfolio-info">
                                    <h4><a href="portfolio-details.html" title="More Details">Kid's Teal Hoodie</a></h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 portfolio-item filter-accessories">
                            <div class="portfolio-wrap">
                                <a href="assets\img\products\accessories\carharttHatBlack1.png" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets\img\products\accessories\carharttHatBlack1.png" class="img-fluid" alt=""></a>
                                <div class="portfolio-info">
                                    <h4><a href="portfolio-details.html" title="More Details">Carhartt Black Hat</a></h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 portfolio-item filter-accessories">
                            <div class="portfolio-wrap">
                                <a href="assets\img\products\accessories\hatVansCream1.png" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets\img\products\accessories\hatVansCream1.png" class="img-fluid" alt=""></a>
                                <div class="portfolio-info">
                                    <h4><a href="portfolio-details.html" title="More Details">Vans Cream Hat</a></h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 portfolio-item filter-accessories">
                            <div class="portfolio-wrap">
                                <a href="assets\img\products\accessories\hatVolcomWine1.png" data-gallery="portfolio-gallery-app" class="glightbox"><img src="assets\img\products\accessories\hatVolcomWine1.png" class="img-fluid" alt=""></a>
                                <div class="portfolio-info">
                                    <h4><a href="portfolio-details.html" title="More Details">Volcom Wine Hat</a></h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                </div>
                            </div>
                        </div>-->

                    <!-- End Portfolio Section -->