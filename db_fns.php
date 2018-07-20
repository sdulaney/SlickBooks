<?php

/*
* Connects to the sdulaney_project database. Returns a MySQL server connect object or FALSE on failure. 
*/
function db_connect() {
    $result = mysqli_connect("localhost", "sdulaney", "p5U5TXdX", "sdulaney_project");
    if (!$result) {
        return FALSE;
    }
    mysqli_autocommit($result, TRUE);
    return $result;
}

/*
* Selects the sdulaney_project database. Returns TRUE on success or FALSE on failure.
*/
function db_select_db() {
    $conn = db_connect();
    $db_name = "sdulaney_project";
    return mysqli_select_db($conn, $db_name);
}

/*
* If the dulaney_stewart_users database table does not exist, create it.
*/
function db_create_table_users() {
    $conn = db_connect();
    $table_name = "dulaney_stewart_users";
    $sql = "show tables like '$table_name'";
    $query_result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query_result) == 0) {
        $sql = "create table $table_name (userid int unsigned not null auto_increment primary key, name char(60) not null, email char(60) not null, password char(60) not null, phone char(60) not null, address char(80) not null, city char(30) not null, state char(20) not null, zip char(10) not null, country char(20) not null)";
        $query_result = mysqli_query($conn, $sql);
        if ($query_result === FALSE) {
            echo "<p>Unable to create the table '$table_name'.</p>" . "<p>Error code " . mysqli_errno($conn) . ": " . mysqli_error($conn) . "</p>";
        }
    }
}

/*
* If the dulaney_stewart_accounts database table does not exist, create it.
*/
function db_create_table_accounts() {
    $conn = db_connect();
    $table_name = "dulaney_stewart_accounts";
    $sql = "show tables like '$table_name'";
    $query_result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query_result) == 0) {
        $sql = "create table $table_name (accountid int unsigned not null auto_increment primary key, userid int unsigned not null, name char(60) not null, type char(60) not null)";
        $query_result = mysqli_query($conn, $sql);
        if ($query_result === FALSE) {
            echo "<p>Unable to create the table '$table_name'.</p>" . "<p>Error code " . mysqli_errno($conn) . ": " . mysqli_error($conn) . "</p>";
        }
    }
}

/*
* If the dulaney_stewart_transactions database table does not exist, create it.
*/
function db_create_table_transactions() {
    $conn = db_connect();
    $table_name = "dulaney_stewart_transactions";
    $sql = "show tables like '$table_name'";
    $query_result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query_result) == 0) {
        $sql = "create table $table_name (transactionid int unsigned not null auto_increment primary key, accountid int unsigned not null, description char(100) not null, type char(60) not null, payee char(60) not null, amount float(6,2) not null, date date not null, category char(60) not null)";
        $query_result = mysqli_query($conn, $sql);
        if ($query_result === FALSE) {
            echo "<p>Unable to create the table '$table_name'.</p>" . "<p>Error code " . mysqli_errno($conn) . ": " . mysqli_error($conn) . "</p>";
        }
    }
}

db_select_db();
db_create_table_users();
db_create_table_accounts();
db_create_table_transactions();

?>