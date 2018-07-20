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
        $sql = "create table $table_name (transactionid int unsigned not null auto_increment primary key, accountid int unsigned not null, description char(100) not null, type char(60) not null, payee char(60) not null, amount float(20,2) not null, date date not null, category char(60) not null)";
        $query_result = mysqli_query($conn, $sql);
        if ($query_result === FALSE) {
            echo "<p>Unable to create the table '$table_name'.</p>" . "<p>Error code " . mysqli_errno($conn) . ": " . mysqli_error($conn) . "</p>";
        }
    }
}

/*
* If the dulaney_stewart_users table is empty, populate it with sample data.
*/
function db_populate_users() {
    $conn = db_connect();
    $table_name = "dulaney_stewart_users";
    $sql = "select * from $table_name";
    $query_result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query_result) == 0) {
        $sql = "insert into $table_name (userid, name, email, password, phone, address, city, state, zip, country) values (null, 'Airbnb', 'info@airbnb.com', sha1('airbnb'), '(855) 424-7262', '888 Brannan St', 'San Francisco', 'CA', '94103', 'United States')";
        $query_result = mysqli_query($conn, $sql);
        $sql = "insert into $table_name (userid, name, email, password, phone, address, city, state, zip, country) values (null, 'Uber', 'info@uber.com', sha1('uber'), '(866) 576-1039', '1455 Market St #400', 'San Francisco', 'CA', '94103', 'United States')";
        $query_result = mysqli_query($conn, $sql);
        $sql = "insert into $table_name (userid, name, email, password, phone, address, city, state, zip, country) values (null, 'Facebook', 'info@facebook.com', sha1('facebook'), '(650) 543-4800', '1 Hacker Way', 'Menlo Park', 'CA', '94025', 'United States')";
        $query_result = mysqli_query($conn, $sql);
        $sql = "insert into $table_name (userid, name, email, password, phone, address, city, state, zip, country) values (null, 'Apple', 'info@apple.com', sha1('apple'), '(408) 606-5775', '1 Infinite Loop', 'Cupertino', 'CA', '95014', 'United States')";
        $query_result = mysqli_query($conn, $sql);
        $sql = "insert into $table_name (userid, name, email, password, phone, address, city, state, zip, country) values (null, 'Microsoft', 'info@microsoft.com', sha1('microsoft'), '(425) 882-8080', '1 Microsoft Way', 'Redmond', 'WA', '98052', 'United States')";
        $query_result = mysqli_query($conn, $sql);
    }
}

/*
* If the dulaney_stewart_accounts table is empty, populate it with sample data.
*/
function db_populate_accounts() {
    $conn = db_connect();
    $table_name = "dulaney_stewart_accounts";
    $sql = "select * from $table_name";
    $query_result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query_result) == 0) {
        $sql = "insert into $table_name (accountid, userid, name, type) values (null, 1, 'Business Checking', 'Bank')";
        $query_result = mysqli_query($conn, $sql);
        $sql = "insert into $table_name (accountid, userid, name, type) values (null, 1, 'Business Credit Card', 'Credit Card')";
        $query_result = mysqli_query($conn, $sql);
        $sql = "insert into $table_name (accountid, userid, name, type) values (null, 2, 'Business Checking', 'Bank')";
        $query_result = mysqli_query($conn, $sql);
        $sql = "insert into $table_name (accountid, userid, name, type) values (null, 2, 'Business Credit Card', 'Credit Card')";
        $query_result = mysqli_query($conn, $sql);
        $sql = "insert into $table_name (accountid, userid, name, type) values (null, 3, 'Business Checking', 'Bank')";
        $query_result = mysqli_query($conn, $sql);
        $sql = "insert into $table_name (accountid, userid, name, type) values (null, 3, 'Business Credit Card', 'Credit Card')";
        $query_result = mysqli_query($conn, $sql);
        $sql = "insert into $table_name (accountid, userid, name, type) values (null, 4, 'Business Checking', 'Bank')";
        $query_result = mysqli_query($conn, $sql);
        $sql = "insert into $table_name (accountid, userid, name, type) values (null, 4, 'Business Credit Card', 'Credit Card')";
        $query_result = mysqli_query($conn, $sql);
        $sql = "insert into $table_name (accountid, userid, name, type) values (null, 5, 'Business Checking', 'Bank')";
        $query_result = mysqli_query($conn, $sql);
        $sql = "insert into $table_name (accountid, userid, name, type) values (null, 5, 'Business Credit Card', 'Credit Card')";
        $query_result = mysqli_query($conn, $sql);
    }
}

/*
* If the dulaney_stewart_transactions table is empty, populate it with sample data.
*/
function db_populate_transactions() {
    $conn = db_connect();
    $table_name = "dulaney_stewart_transactions";
    $sql = "select * from $table_name";
    $query_result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query_result) == 0) {
        $sql = "insert into $table_name (transactionid, accountid, description, type, payee, amount, date, category) values (null, 1, 'Advertising Agency', 'Expense', 'Wieden & Kennedy', 3000000, '2017-09-12', 'Advertising & Marketing')";
        $query_result = mysqli_query($conn, $sql);
        $sql = "insert into $table_name (transactionid, accountid, description, type, payee, amount, date, category) values (null, 2, 'Salesforce Sales Cloud CRM', 'Expense', 'Salesforce', 1000000, '2018-01-01', 'Office Supplies & Software')";
        $query_result = mysqli_query($conn, $sql);
        $sql = "insert into $table_name (transactionid, accountid, description, type, payee, amount, date, category) values (null, 2, 'Accounting Services', 'Expense', 'Deloitte', 2000000, '2018-04-01', 'Legal & Professional Services')";
        $query_result = mysqli_query($conn, $sql);
        $sql = "insert into $table_name (transactionid, accountid, description, type, payee, amount, date, category) values (null, 3, 'Advertising Agency', 'Expense', 'Goodby, Silverstein & Partners', 2500000, '2018-05-12', 'Advertising & Marketing')";
        $query_result = mysqli_query($conn, $sql);
        $sql = "insert into $table_name (transactionid, accountid, description, type, payee, amount, date, category) values (null, 4, 'Oracle Sales Cloud CRM', 'Expense', 'Oracle', 1500000, '2018-02-10', 'Office Supplies & Software')";
        $query_result = mysqli_query($conn, $sql);
        $sql = "insert into $table_name (transactionid, accountid, description, type, payee, amount, date, category) values (null, 4, 'Accounting Services', 'Expense', 'KPMG', 2500000, '2018-03-20', 'Legal & Professional Services')";
        $query_result = mysqli_query($conn, $sql);
        $sql = "insert into $table_name (transactionid, accountid, description, type, payee, amount, date, category) values (null, 5, 'Advertising Agency', 'Expense', 'CDW', 3000000, '2018-02-12', 'Advertising & Marketing')";
        $query_result = mysqli_query($conn, $sql);
        $sql = "insert into $table_name (transactionid, accountid, description, type, payee, amount, date, category) values (null, 6, 'Microsoft Dynamics CRM', 'Expense', 'Microsoft', 1000000, '2018-03-04', 'Office Supplies & Software')";
        $query_result = mysqli_query($conn, $sql);
        $sql = "insert into $table_name (transactionid, accountid, description, type, payee, amount, date, category) values (null, 6, 'Accounting Services', 'Expense', 'Ernst & Young', 3000000, '2018-02-24', 'Legal & Professional Services')";
        $query_result = mysqli_query($conn, $sql);
        $sql = "insert into $table_name (transactionid, accountid, description, type, payee, amount, date, category) values (null, 7, 'Advertising Agency', 'Expense', 'BFG', 2000000, '2018-01-11', 'Advertising & Marketing')";
        $query_result = mysqli_query($conn, $sql);
        $sql = "insert into $table_name (transactionid, accountid, description, type, payee, amount, date, category) values (null, 8, 'Insightly CRM', 'Expense', 'Insightly', 1500000, '2018-05-06', 'Office Supplies & Software')";
        $query_result = mysqli_query($conn, $sql);
        $sql = "insert into $table_name (transactionid, accountid, description, type, payee, amount, date, category) values (null, 8, 'Accounting Services', 'Expense', 'PricewaterhouseCoopers', 4000000, '2018-05-29', 'Legal & Professional Services')";
        $query_result = mysqli_query($conn, $sql);
        $sql = "insert into $table_name (transactionid, accountid, description, type, payee, amount, date, category) values (null, 9, 'Advertising Agency', 'Expense', 'KBS', 3000000, '2018-01-19', 'Advertising & Marketing')";
        $query_result = mysqli_query($conn, $sql);
        $sql = "insert into $table_name (transactionid, accountid, description, type, payee, amount, date, category) values (null, 10, 'SAP CRM', 'Expense', 'SAP SE', 2000000, '2018-06-07', 'Office Supplies & Software')";
        $query_result = mysqli_query($conn, $sql);
        $sql = "insert into $table_name (transactionid, accountid, description, type, payee, amount, date, category) values (null, 10, 'Accounting Services', 'Expense', 'Rothstein Kass', 5000000, '2018-03-21', 'Legal & Professional Services')";
        $query_result = mysqli_query($conn, $sql);
    }
}

/*
* Seed the sdulaney_project database with sample data.
*/
function db_seed_db() {
    db_populate_users();
    db_populate_accounts();
    db_populate_transactions();
}

db_select_db();
db_create_table_users();
db_create_table_accounts();
db_create_table_transactions();
db_seed_db();

?>