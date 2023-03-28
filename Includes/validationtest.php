<?php

function loginValidation ($email, $password) {

    if (empty($email)) {
        session_start();
        $_SESSION["error"] = "Email field is empty";
        header("location: ". $_SERVER['HTTP_REFERER']);
        exit();
    } else if (empty($password)) {
        session_start();
        $_SESSION["error"] = "Password field is empty";
        header("location: ". $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        unset($_SESSION["error"]);
    }
}


?>