<?php

    session_start();

    if (isset($_POST["review"]["submit"])) {

        $sqlConnection = mysqli_connect("localhost:3306", "root", "", "dummyForm");

        if (mysqli_connect_errno()) {
            prinf ("Could not connect to DB: %s", mysqli_connect_error());
        } else {

            $accountID = $_SESSION["account"]["AccountID"];
            $score = $_POST["review"]["score"];
            $title = mysqli_real_escape_string($sqlConnection, $_POST["review"]["title"]);
            $body = mysqli_real_escape_string($sqlConnection, $_POST["review"]["body"]);
            $product = $_POST["review"]["product"];

            $query = "INSERT INTO reviews VALUES ('$product', '$title', '$accountID', '$score', '$body')";
            $res = mysqli_query($sqlConnection, $query);

            if ($res) {
                mysqli_close($sqlConnection);
                header("Location: ". $_SERVER["HTTP_REFERER"]);
            }
        }
}

?>