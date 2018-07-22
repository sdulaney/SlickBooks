<?php

/*
* Insert a new transaction into the database. Returns the transactionid of the record inserted.
*/
function insert_transaction($accountid, $description, $type, $payee, $amount, $date, $category) {
    $conn = db_connect();
    $sql = "insert into dulaney_stewart_transactions (transactionid, accountid, description, type, payee, amount, date, category) values (null, $accountid, '$description', '$type', '$payee', $amount, '$date', '$category')";
    $query_result = mysqli_query($conn, $sql);
    return mysqli_insert_id($conn);
}

/*
* Returns an array of all transactions in the database.
*/
function get_transactions() {
    $conn = db_connect();
    $sql = "select * from dulaney_stewart_transactions";
    $query_result = mysqli_query($conn, $sql);
    return db_result_to_array($query_result);
}

/*
* Returns an associative array containing all details for a given transactionid.
*/
function get_transaction_details($transactionid) {
    $conn = db_connect();
    $sql = "select * from dulaney_stewart_transactions where transactionid = $transactionid";
    $query_result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($query_result);
}

?>