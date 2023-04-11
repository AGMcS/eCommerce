<?php

    function updateAccount($sqlConnection, $queryString) {

        $update = mysqli_query($sqlConnection, $queryString);

        if ($update) {
            if(isset($_POST["edit"])) {
                unset($_POST["edit"]);
            }
        }

        mysqli_close($sqlConnection);
        header("location: http://localhost/website/adminAccountsPage.php");
    }

    if(isset($_POST["edit"][$_POST["edit"]["id"]."delete"])) {
        $sqlConnection = mysqli_connect("localhost:3306", "root", "", "dummyForm");

        if (mysqli_connect_errno()) {
            printf ("Could not connect to DB: %s", mysqli_connect_error());
        } else {
            $queryString = "DELETE FROM account WHERE AccountID = '".$_POST["edit"]["id"]."'";
            updateAccount($sqlConnection, $queryString);
        }
    } else if (isset($_POST["edit"][$_POST["edit"]["id"]."submit"])) {

        $sqlConnection = mysqli_connect("localhost:3306", "root", "", "dummyForm");

        if (mysqli_connect_errno()) {
            printf ("Could not connect to DB: %s", mysqli_connect_error());
        } else {
            $queryString = "UPDATE account
                            SET FirstName = '".$_POST["edit"]["firstName"].
                                "', LastName = '".$_POST["edit"]["lastName"].
                                "', Street = '".$_POST["edit"]["street"].
                                "', City = '".$_POST["edit"]["city"].
                                "', Country = '".$_POST["edit"]["country"].
                                "', Postcode = '".$_POST["edit"]["postcode"].
                                "', Email = '".$_POST{"edit"}["email"].
                            "' WHERE AccountID = '".$_POST["edit"]["id"]."'";
            updateAccount($sqlConnection, $queryString);
        }
    }
?>