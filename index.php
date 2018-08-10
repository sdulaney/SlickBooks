<?php
  include_once("slickbooks_fns.php");
  session_start();

  // Login
  if (!empty($_POST["email"]) && !empty($_POST["password"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    if (login($email, $password)) {
        $_SESSION["userid"] = get_userid($email);
    }
  }

  // Logout
  if (!empty($_POST["logout"])) {
    logout();
  }

  do_html_header("SlickBooks Dashboard");
  do_html_heading("Dashboard");
  display_transaction_filter_form();

  $transaction_array = get_transactions();
  // Filter transactions by date range
  if (!empty($_POST["filter_start_date"]) && !empty($_POST["filter_end_date"])) {
    $transaction_array = filter_transaction_by_date_range($transaction_array, $_POST["filter_start_date"], $_POST["filter_end_date"]);
  }
  display_transactions($transaction_array);
  
  do_html_footer();
?>
