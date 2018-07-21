<?php

/*
* Returns an array of all transactions in the database.
*/
function get_transactions() {
    $conn = db_connect();
    $sql = "select * from dulaney_stewart_transactions";
    $query_result = mysqli_query($conn, $sql);
    return db_result_to_array($query_result);
}

?>