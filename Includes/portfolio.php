 <!-- ======= Portfolio Section ======= -->

<?php
    function displaySizes ($productID, $sqlConnection) {

        if (str_contains($productID, 'ACC')) {
            $query = "SELECT Amount FROM stock WHERE ProductID = '". $productID."' AND Amount > 0";
            $res = mysqli_query($sqlConnection, $query);
            $count = mysqli_num_rows($res);

            if($count > 0) {
?>
            <form action="http://localhost/website/Includes/addCartItems.php" method="post">
                <input type="hidden" name="add[product]" value="<?php echo $productID; ?>">
                <input type="hidden" name="url" value="<?php echo 'http://'. $SERVER['REQUEST_URI']; ?>">
                <button type="submit" name="add[submit]" class="btn btn-primary">Add to Basket</button>
            </form>
<?php
            } else {
?>              <p class="text-danger">Sorry, this item is currently out of stock.</p>
<?php
            }
        } else {
            $query = "SELECT * FROM stock WHERE ProductID = '". $productID. "' ORDER BY Size DESC";
            $res = mysqli_query($sqlConnection, $query);
?>

            <h4>Size</h4>
            <form action="http://localhost/website/Includes/addCartItems.php" method="post">
            <select name="add[size]" id="" class="form-select mb-3" required>

<?php

            while ($array = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                if ($array["Amount"] > 0) {
                    echo "<option value=".$array["Size"].">".$array["Size"]."</option>";
                }
            }
?>
            <input type="hidden" name="product" value="<?php echo $productID; ?>">
            <input type="hidden" name="url" value="<?php echo 'http://'. $SERVER['REQUEST_URI']; ?>">
            <button type="submit" name="add[submit]" class="btn btn-primary">Add to Basket</button>
            </form>
<?php   
        }
    }
 ?>

<?php

    function deleteTicket($email, $date, $time) {

        $sqlConnection = mysqli_connect("localhost:3306", "root", "", "dummyForm");
        $query = "DELETE FROM userQueries WHERE Email = '$email' AND queryDate= '$date' AND time='$time'";

        $res = mysqli_query($sqlConnection, $query);

        if ($res == 1) {
            header("location: http://localhost/website/ticketPage.php");
        } else {
            echo "ERROR";
        }

        mysqli_close($sqlConnection);
    }
?>

<?php

    function displayClothes($filter) {
        $sqlConnection = mysqli_connect("localhost:3306", "root", "", "dummyForm");

        if (mysqli_connect_errno()) {
            printf("Connection to DB failed: %s \n", mysqli_connect_error());
        } else {
            $query = "SELECT * FROM product WHERE ProductID LIKE '%{$filter}%'";
            $res = mysqli_query($sqlConnection, $query);
            
            while($array = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                $itemID = $array["ProductID"];
                $name = $array["Name"];
                $price = $array["Price"];
                $image = $array["ImagePath"];
                $altImage = $array["AltImagePath"];
                $altImageTwo = $array["AltImagePathTwo"];
                $imageID = "#". $itemID. "Image";
                $description = $array["Description"];
                $qs = http_build_query($array);
                $url = "http://localhost/website/index.php?".$qs;
                ?>

                <div class='col-xl-4 col-md-6 portfolio-item filter-mens'>
                    <div class='portfolio-wrap'>
                        <a href="<?php echo $image; ?>" data-gallery='portfolio-gallery-app' class='glightbox'><img src="<?php echo $image; ?>" class='img-fluid' alt=''></a>
                        <div class='portfolio-info'>
                            <h4><a href="<?php echo $url; ?>" data-bs-toggle='modal' class='text-success' data-bs-target="<?php echo "#".$itemID."Modal"; ?>"><?php echo $name; ?></a></h4>
                            <h5><?php printf("£%0.2f", $price); ?></h5>
                        </div>
                    </div>
                </div>
                
                <div class="modal fade" id="<?php echo $itemID."Modal"; ?>" tabindex="-1" data-backdrop="false" aria-labelledby="clothesModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="productNameModalLabel"><?php echo $name; ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <!--Main Image-->
                                    <div class="row">
                                        <div class="col-md-9 col-sm-6 col-xs-12 mb-3">
                                            <img src="<?php echo $image; ?>" alt="" id="<?php echo $itemID."Image"; ?>" class="img-fluid main-img" style="height: 500px;">
                                        </div>
                                        <!--Thumbnails-->
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                                    <img src="<?php echo $image; ?>" alt="" class="img-fluid img-thumbnail thumb-img" onclick="document.querySelector('<?php echo $imageID; ?>').src = this.src;">
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                                    <img src="<?php echo (isset($altImage)) ? $altImage : ""; ?>" alt="" class="img-fluid img-thumbnail thumb-img" onclick="document.querySelector('<?php echo $imageID; ?>').src = this.src;">
                                                </div>
                                                <?php if (isset($altImageTwo)) { ?>
                                                <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                                    <img src="<?php echo (isset($altImageTwo)) ? $altImageTwo : ""; ?>" alt="" class="img-fluid img-thumbnail thumb-img" onclick="document.querySelector('<?php echo $imageID; ?>').src = this.src;">
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="hr-splitter" />

                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                            <h4>Product Description</h4>
                                            <p class="tab">
                                                <?php echo $description; ?>
                                            </p>
                                            <h4>Price</h4>
                                            <p class="tab">
                                                <?php printf("£%0.2f", $price); ?>
                                            </p>
                                            <?php displaySizes($itemID, $sqlConnection); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        <?php
            }     
            mysqli_close($sqlConnection);
        }
    }
?>

<?php
    function returnSearchItems($searchTag) {
        $sqlConnection = mysqli_connect("localhost:3306", "root", "", "dummyForm");

        if (mysqli_connect_errno()) {
            printf("Connection to DB failed: %s \n", mysqli_connect_error());
        } else {
            $query = "SELECT * FROM product WHERE Tags LIKE '%{$searchTag}%'";
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
            
            mysqli_close($sqlConnection);
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

                echo "<tr class='table-active'>";
                echo "<td>".$count."</td>";
                echo "<td>".$name."</td>";
                echo "<td>".$email."</td>";
                echo "<td><b><a href='#' data-bs-toggle='modal' class='text-success' data-bs-target='#".$message."Modal'>".$subject."</a></b></td>";
                echo "<td>".$date."</td>";
                echo "<td>".$time."</td>";
                echo "<td><form action=".$_SERVER["PHP_SELF"]." method='post'><button type='submit' name='".$count."Delete' class='btn btn-danger'>Delete</button></form></td>";
                echo "</tr>";

                if (isset($_POST[$count."Delete"])) {
                    deleteTicket($email, $date, $time);
                }
                ?>

                <div class="modal fade" id="<?php echo $message."Modal"; ?>" tabindex="-1" aria-labelledby="signOutModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-light" id="signOutModalLabel"><?php echo $subject ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3 text-center">
                                    <p><?php echo $message; ?></p>
                                </div>
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

<?php 

    function displayUsers($filter) {

        $sqlConnection = mysqli_connect("localhost:3306", "root", "", "dummyForm");

        if (mysqli_connect_errno()) {
            printf("Could not connect to DB: %S", mysqli_connect_error());
        } else {
            $query = "SELECT AccountID, FirstName, LastName, Street, City, Country, Postcode, Email FROM account ".$filter;
            $res = mysqli_query($sqlConnection, $query);

            if($res) {
                while ($array = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                    static $count;
                    $count++;

                    $accountID = $array["AccountID"];
                    $firstName = $array["FirstName"];
                    $lastName = $array["LastName"];
                    $street = $array["Street"];
                    $city = $array["City"];
                    $postcode = $array["Postcode"];
                    $country = $array["Country"];
                    $email = $array["Email"];

                    echo "<tr class='table-active'>";
                    echo "<td>".$count."</td>";
                    echo "<td>".$accountID."</td>";
                    echo "<td>".$firstName."</td>";
                    echo "<td>".$lastName."</td>";
                    echo "<td>".$street."</td>";
                    echo "<td>".$city."</td>";
                    echo "<td>".$country."</td>";
                    echo "<td>".$postcode."</td>";
                    echo "<td>".$email."</td>";
                    echo "<td><a href='#' data-bs-toggle='modal' class='text-success' data-bs-target='#".$accountID."Modal'>Edit</a></td>";
                    echo "</tr>";
                    ?>

                    <div class="modal fade" id="<?php echo $accountID."Modal"; ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-light" id="signOutModalLabel"><?php echo $accountID ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="form" action="http://localhost/website/Includes/adminAlterAccount.php" method="post">

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="editFirstName" class="form-label">First Name</label>
                                                <input type="text" name="edit[firstName]" class="form-control" id="editFirstName" value="<?php echo $firstName ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="editLastName" class="form-label">Last Name</label>
                                                <input type="text" name="edit[lastName]" class="form-control" id="editLastName" value="<?php echo $lastName ?>">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="editAddress" class="form-label">Address</label>
                                            <input type="text" name="edit[street]" class="form-control" id="editAddress" value="<?php echo $street ?>">
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="editCity" class="form-label">City</label>
                                                <input type="text" name="edit[city]" class="form-control" id="editCity" value="<?php echo $city ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="editCountry" class="form-label">Country</label>
                                                <select id="editCountry" name="edit[country]" class="form-select">
                                                    <option value="England" <?php echo ($country == "England") ? "selected" : ""; ?>>England</option>
                                                    <option value="Scotland" <?php echo ($country == "Scotland") ? "selected" : ""; ?>>Scotland</option>
                                                    <option value="Northern Ireland" <?php echo ($country == "Northern Ireland") ? "selected" : ""; ?>>Northern Ireland</option>
                                                    <option value="Wales" <?php echo ($country == "Wales") ? "selected" : ""; ?>>Wales</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">

                                            <div class="col-md-6">
                                                <label for="editPostcode" class="form-label">Zip</label>
                                                <input type="text" name="edit[postcode]" class="form-control" id="editPostcode" value="<?php echo $postcode ?>">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="editEmail" class="form-label">Email</label>
                                                <input type="email" name="edit[email]" class="form-control" id="editEmail" value="<?php echo $email ?>">
                                            </div>

                                        </div>

                                        <div class="row-mb-3 text-center">
                                            <input type="hidden" name="edit[id]" value="<?php echo $accountID; ?>">
                                            <button type="submit" style="background-color: #008d7d;" name="<?php echo "edit[".$accountID."submit]"; ?>" class="btn text-light">Save Changes</button>
                                            <button type="submit" style="background-color: rgba(248, 90, 64, 0.8); font-weight: 600" name="<?php echo "edit[".$accountID."delete]"; ?>" class="btn text-dark">Delete Account</button>
                                        </div>

                                        <hr class="hr-splitter">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                    
                }
            }
        }

        mysqli_close($sqlConnection);
    }

?>

<?php

    function displayAccount() {

        $sqlConnection = mysqli_connect("localhost:3306", "root", "", "dummyForm");

        if (mysqli_connect_errno()) {
            printf ("Could not connect to DB: %s", mysqli_connect_error());
        } else {
            $query = "SELECT * FROM account WHERE AccountID = '".$_SESSION["accountID"]."'";

            $res = mysqli_query($sqlConnection, $query);

            if ($res) {
                $array = mysqli_fetch_array($res, MYSQLI_ASSOC);

                $firstName = $array["FirstName"];
                $lastName = $array["LastName"];
                $street = $array["Street"];
                $city = $array["City"];
                $country = $array["Country"];
                $postcode = $array["Postcode"];
                $email = $array["Email"];

                ?>

                <table class="table">
                    <tr>
                        <td class="text-end"><b>Account ID</b></td>
                        <td><?php echo $_SESSION["accountID"]; ?></td>
                    </tr>
                    <tr>
                        <td class="text-end"><b>Name</b></td>
                        <td><?php echo $firstName." ".$lastName; ?></td>
                    </tr>
                    <tr>
                        <td class="text-end"><b>Address</b></td>
                        <td><?php echo $street; ?></td>
                    </tr>
                    <tr>
                        <td class="text-end"></td>
                        <td><?php echo $city; ?></td>
                    </tr>
                    <tr>
                        <td class="text-end"></td>
                        <td><?php echo $country; ?></td>
                    </tr>
                    <tr>
                        <td class="text-end"></td>
                        <td><?php echo $postcode; ?></td>
                    </tr>
                    <tr>
                        <td class="text-end"><b>E-mail</b></td>
                        <td><?php echo $email; ?></td>
                    </tr>
                </table>

                <?php
            }
        }
    }
?>
