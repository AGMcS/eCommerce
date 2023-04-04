<?php

function loginValidation ($email, $password) {

    if (empty($email) && empty($password)) {
        header("location: http://localhost/website/index.php?errorEmail=Email+field+is+empty&errorPassword=Password+field+is+empty");
        exit();
    }

    if (empty($email)) {
        header("location: http://localhost/website/index.php?errorEmail=Email+field+is+empty");
        exit();
    }

    if (empty($password)) {
        header("location: http://localhost/website/index.php?errorPassword=Password+field+is+empty");
        exit();
    }
    
}

?>