<?php
    include_once("slickbooks_fns.php");
    session_start();

    if (filled_out($_POST)) {
        $userid = $_POST["userid"];
        $name = $_POST["name"];
        $type = $_POST["type"];
        $accountid = insert_account($userid, $name, $type);

        do_html_header("Account Added");
        do_html_heading("Account Added");
        display_success_callout("Your Account \"" . get_account_name($accountid) . "\" Has Been Added", "Please return to the dashboard for a list of transactions and accounts.", "Return to Dashboard", "http://www.smccs85.com/~sdulaney/project/");
        do_html_footer();
    }

?>
