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

  do_html_header("SlickBooks");
  do_html_heading("Expense Transactions");

  $transaction_array = get_transactions();
  display_transactions($transaction_array);
  
  do_html_footer();
?>
