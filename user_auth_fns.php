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
* Logs out the current user by killing the session.
*/
function logout() {
    // Unset all of the session variables
    $_SESSION = array();
    // Delete the session cookie
    // This code was copied from the PHP Manual: http://php.net/manual/en/function.session-destroy.php
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    // Destroy the session
    session_destroy();
}

/*
* Returns TRUE if a user is logged in. Otherwise, return FALSE.
*/
function check_user() {
    return (isset($_SESSION["userid"]));
}

?>
