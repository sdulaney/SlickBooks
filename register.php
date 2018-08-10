<?php
    include_once("slickbooks_fns.php");
    session_start();

    if (filled_out($_POST)) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $city = $_POST["city"];
        $state = $_POST["state"];
        $zipcode = $_POST["zipcode"];
        $country = $_POST["country"];

        if ($password !== $confirm_password) {
            do_html_header("Error! Passwords Do Not Match");
            do_html_heading("Error! Passwords Do Not Match");
            display_alert_callout("Error! Passwords Do Not Match", "Passwords must match. Please try submitting the registration form again.", "Register", "http://www.smccs85.com/~sdulaney/project/register_form.php");
        } else {
            insert_user($name, $email, $password, $phone, $address, $city, $state, $zip, $country);
            do_html_header("Registration Complete");
            do_html_heading("Registration Complete");
            display_success_callout("Your Registration is Now Complete", "Please login to start adding accounts and transactions.", "Login", "http://www.smccs85.com/~sdulaney/project/login_form.php");
        }

    } else {
        do_html_header("Error! Missing Form Fields");
        do_html_heading("Error! Missing Form Fields");
        display_alert_callout("Error! Missing Form Fields", "All registration form fields are required. Please try submitting the registration form again.", "Register", "http://www.smccs85.com/~sdulaney/project/register_form.php");
    }

    do_html_footer();

?>
