<?php
if (isset($_POST["registerSubmit"])) {
        $sqlConnection = mysqli_connect("localhost:3306", "root", "", "dummyForm");

        $accID = "US". rand(10000, 99999);

        $query = "SELECT * FROM account WHERE AccountID = '$accID'";
        $res = mysqli_query($sqlConnection, $query);
        $count = mysqli_num_rows($res);

        while ($count > 0) {
            $accID = "US". rand(10000, 99999);
            $res = mysqli_query($sqlConnection, $query);
            $count = mysqli_num_rows($res);
        }

        $firstName = mysqli_real_escape_string($sqlConnection, $_POST["register"]["firstName"]);
        $lastName = mysqli_real_escape_string($sqlConnection, $_POST["register"]["lastName"]);
        $street = mysqli_real_escape_string($sqlConnection, $_POST["register"]["street"]);
        $city = mysqli_real_escape_string($sqlConnection, $_POST["register"]["city"]);
        $country = mysqli_real_escape_string($sqlConnection, $_POST["register"]["country"]);
        $postcode = mysqli_real_escape_string($sqlConnection, $_POST["register"]["postcode"]);
        $email = mysqli_real_escape_string($sqlConnection, $_POST["register"]["email"]);
        $password = mysqli_real_escape_string($sqlConnection, $_POST["register"]["password"]);

        $query = "INSERT INTO account VALUES ('$accID', null, '$firstName', '$lastName', '$street', '$city', '$country', '$postcode', '$email', '$password')";
        $res = mysqli_query($sqlConnection, $query);

        if ($res == 1) {
            header("location: ../index.php");
        }
    }
?>