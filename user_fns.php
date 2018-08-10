<?php

/*
* Insert a new user into the database.
*/
function insert_user($name, $email, $password, $phone, $address, $city, $state, $zip, $country) {
    $conn = db_connect();
    $sql = "insert into dulaney_stewart_users (userid, name, email, password, phone, address, city, state, zip, country) values (null, '$name', '$email', sha1('$password'), '$phone', '$address', '$city', '$state', '$zip', '$country')";
    $query_result = mysqli_query($conn, $sql);
}

/*
* Returns an array of all users in the database.
*/
function get_all_users() {
    $conn = db_connect();
    $sql = "select * from dulaney_stewart_users";
    $query_result = mysqli_query($conn, $sql);
    return db_result_to_array($query_result);
}

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

/*
* Returns the name for a user given their userid.
*/
function get_user_name($userid) {
    $conn = db_connect();
    $sql = "select name from dulaney_stewart_users where userid = $userid";
    $query_result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query_result);
    return $row["name"];
}

?>
