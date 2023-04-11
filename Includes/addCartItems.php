<?php

session_start();

if (isset ($_POST["add"]["submit"])) {

    $sqlConnection = mysqli_connect("localhost:3306", "root", "", "dummyForm");

    if (mysqli_connect_errno()) {
        printf("Could not connect to DB: %s", mysqli_connect_error());
    } else {
        $query = "SELECT * FROM product WHERE ProductID = '". $_POST["add"]["product"]. "'";
        $res = mysqli_query($sqlConnection, $query);

        if ($res) {
            $array = mysqli_fetch_array($res, MYSQLI_ASSOC);
            $_SESSION["cartCount"] += 1;   
            $_SESSION["cart"][$_SESSION["cartCount"]] = $array;

            if (isset($_POST["add"]["size"])) {
                $_SESSION["cart"][$_SESSION["cartCount"]]["Size"] = $_POST["add"]["size"];
            }
        }

        mysqli_close($sqlConnection);
        header("Location: ".$_SERVER["HTTP_REFERER"]."#shop");
    }
}

?>