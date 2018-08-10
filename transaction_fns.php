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

/*
* Returns an array of transactions filtered by the specified date range.
*/
function filter_transaction_by_date_range($transaction_array, $start_date, $end_date) {
    $result_array = array();
    foreach ($transaction_array as $row) {
        // Compare dates as strings in the format Y-m-d
        if (($row["date"] >= $start_date) && ($row["date"] <= $end_date)) {
            array_push($result_array, $row);
        }
    }
    return $result_array;
}

/*
* Returns the transaction description for a transactionid.
*/
function get_transaction_description($transactionid) {
    $conn = db_connect();
    $sql = "select description from dulaney_stewart_transactions where transactionid = $transactionid";
    $query_result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query_result);
    return $row["description"];
}

?>