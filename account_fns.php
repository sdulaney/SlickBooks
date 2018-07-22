<?php

/*
* Returns the account name for an accountid.
*/
function get_account_name($accountid) {
    $conn = db_connect();
    $sql = "select name from dulaney_stewart_accounts where accountid = $accountid";
    $query_result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query_result);
    return $row["name"];
}

/*
* Returns the owner name for an accountid.
*/
function get_account_owner($accountid) {
    $conn = db_connect();
    $sql = "select userid from dulaney_stewart_accounts where accountid = $accountid";
    $query_result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query_result);
    
    $sql = "select name from dulaney_stewart_users where userid = " . $row["userid"];
    $query_result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query_result);
    return $row["name"];
}

/*
* Returns an array of all accounts that belong to the current user.
*/
function get_accounts() {
    $conn = db_connect();
    $userid = $_SESSION["userid"];
    $sql = "select * from dulaney_stewart_accounts where userid = $userid";
    $query_result = mysqli_query($conn, $sql);
    return db_result_to_array($query_result);
}

?>