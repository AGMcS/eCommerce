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
                        $quantity = $value["Quantity"];
                        (isset($value["Size"])) ? $size = $value["Size"] : $size = null;
                        $purchaseQuery = "INSERT INTO purchaseHistory VALUES ('$accountID', '$product', '$size', '$quantity', '$date', '$time')";
                        $addNewPurchase = mysqli_query($sqlConnection, $purchaseQuery);

                            if ($addNewPurchase) {
                                $updateQuery = "UPDATE stock SET Amount = Amount - ".$quantity." WHERE Amount > 0 AND ProductID = '". $value["ProductID"]. "' AND Size = '". $size. "'";
                                $updateStock = mysqli_query($sqlConnection, $updateQuery);
                            } else {
                                header("Location: ".$_SERVER["HTTP_REFERER"]."?purchase=unsuccessful");
                            }
                    }
                    unset($_SESSION["cart"]);
                    $_SESSION["cartCount"] = 0;
                    header("Location: ".$_SERVER["HTTP_REFERER"]."?purchase=successful");
                }

            }
        }
?>