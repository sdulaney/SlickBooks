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

?>