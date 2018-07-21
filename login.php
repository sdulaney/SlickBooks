<?php
    include_once("slickbooks_fns.php");
    session_start();

    if (!empty($_POST["email"]) && !empty($_POST["password"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        if (login($email, $password)) {
            echo "<p>Login successful</p>";
            $_SESSION["userid"] = get_userid($email);
        } else {
            echo "<p>Invalid credentials</p>";
        }
    }

?>
