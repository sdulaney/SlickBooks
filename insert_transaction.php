<?php
    include_once("slickbooks_fns.php");
    session_start();

    if (filled_out($_POST)) {
        $accountid = $_POST["accountid"];
        $description = $_POST["description"];
        $type = $_POST["type"];
        $payee = $_POST["payee"];
        $amount = $_POST["amount"];
        $date = $_POST["date"];
        $category = $_POST["category"];
        $transactionid = insert_transaction($accountid, $description, $type, $payee, $amount, $date, $category);

        do_html_header("Transaction Added");
        do_html_heading("Transaction Added");
        display_transaction_details(get_transaction_details($transactionid));
        do_html_footer();
    }

?>
