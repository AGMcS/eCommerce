 <!-- ======= Portfolio Section ======= -->

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
                    $name = $array["FirstName"]." ".$array["LastName"];
                    $street = $array["Street"];
                    $city = $array["City"];
                    $postcode = $array["Postcode"];
                    $country = $array["Country"];
                    $email = $array["Email"];

                    echo "<tr class='table-active'>";
                    echo "<td>".$count."</td>";
                    echo "<td>".$accountID."</td>";
                    echo "<td>".$name."</td>";
                    echo "<td>".$street."</td>";
                    echo "<td>".$city."</td>";
                    echo "<td>".$country."</td>";
                    echo "<td>".$postcode."</td>";
                    echo "<td>".$email."</td>";
                    echo "</tr>";
                }
            }
        }

        mysqli_close($sqlConnection);
    }

?>
