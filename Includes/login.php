<!-- Apply sign in to database -->
<?php

if (isset($_POST["signInSubmit"])) {

    include("validationtest.php");

    session_start();
    $_SESSION["email"] = htmlspecialchars($_POST["signInEmail"]);
    $_SESSION["password"] = htmlspecialchars($_POST["signInPassword"]);

    loginValidation($_SESSION["email"], $_SESSION["password"]);

    $sqlConnection = mysqli_connect("localhost", "root", "", "dummyForm");
    $email = mysqli_real_escape_string($sqlConnection, $_POST["signInEmail"]);
    $password = mysqli_real_escape_string($sqlConnection, $_POST["signInPassword"]);

    if (mysqli_connect_errno()) {
        printf("Connection to DB failed: %s \n", mysqli_connect_error());
    } else {

        $sql = "SELECT * FROM account WHERE Email = '$email' and Password = '$password'";

        $res = mysqli_query($sqlConnection, $sql);
        $count = mysqli_num_rows($res);
        $array = mysqli_fetch_array($res, MYSQLI_ASSOC);
        $userName = $array["FirstName"];

        if ($count == 1) {
            session_start();
            unset($_SESSION["error"]);
            $_SESSION["userName"] = $userName;
            if ($array["AdminID"] != null ) {
                $_SESSION["adminID"] = $array["AdminID"];
            }
            header("location: ../index.php");
        } else {
            header("location: http://localhost/website/index.php?wrongCredentials=Incorrect+email+or+password");
        }
    }
} else {
    session_start();

    if(isset($_SESSION["email"])) {
        unset($_SESSION["email"]);
    }

    if(isset($_SESSION["password"])) {
        unset($_SESSION["password"]);
    }
    header("location: ../index.php");
}

?>