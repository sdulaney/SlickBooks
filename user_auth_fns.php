<?php

/*
* Returns TRUE if login credentials are valid. Otherwise, return FALSE.
*/
function login($email, $password) {
    $conn = db_connect();
    $sql = "select * from dulaney_stewart_users where email = '" . mysqli_real_escape_string($conn, $email) . "' and password = '" . sha1(mysqli_real_escape_string($conn, $password)) . "'";
    $query_result = mysqli_query($conn, $sql);
    return (mysqli_num_rows($query_result) > 0);
}

/*
* Returns TRUE if a user is logged in. Otherwise, return FALSE.
*/
function check_user() {
    return (isset($_SESSION["userid"]));
}

?>
