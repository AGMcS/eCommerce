<?php
    session_start();

        if (isset($_POST["payment"]["submit"])) {

            $sqlConnection = mysqli_connect("localhost:3306", "root", "", "dummyForm");

            if (mysqli_connect_errno()) {
                printf("Could not connect to DB: %s", mysqli_connect_error());
            } else {
                
                if(isset($_SESSION["account"])) {
                    $accountID = $_SESSION["account"]["AccountID"];
                    $date = date("Y.m.d");
                    $time = date("H:i:s");
                    
                    foreach($_SESSION["cart"] as $key=> $value) {
                        $product = $value["ProductID"];
                        (isset($value["Size"])) ? $size = $value["Size"] : $size = null;
                        $purchaseQuery = "INSERT INTO purchaseHistory VALUES ('$accountID', '$product', '$size' ,'$date', '$time')";
                        $addNewPurchase = mysqli_query($sqlConnection, $purchaseQuery);

                            if ($addNewPurchase) {
                                $updateQuery = "UPDATE stock SET Amount = Amount - 1 WHERE Amount > 0 AND ProductID = '". $value["ProductID"]. "' AND Size = '". $value["Size"]. "'";
                                $updateStock = mysqli_query($sqlConnection, $updateQuery);

                                if (!$addNewPurchase) {
                                    echo "Your purchase was unsuccessful";
                                }
                            } else {
                                echo "Your purchase was unsuccessful";
                            }
                    }

                    echo "Your purchase was successful!";
                    unset($_SESSION["cart"]);
                    $_SESSION["cartCount"] = 0;

                }

            }
        }
?>