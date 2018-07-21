<?php

/*
* Returns the userid for a given email.
*/
function get_userid($email) {
    $conn = db_connect();
    $sql = "select userid from dulaney_stewart_users where email = '$email'";
    $query_result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query_result);
    return $row["userid"];
}

?>
