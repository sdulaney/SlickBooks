<?php
  include_once("slickbooks_fns.php");

  do_html_header("SlickBooks");
  do_html_heading("Expense Transactions");

  $transaction_array = get_transactions();
  display_transactions($transaction_array);
  
  do_html_footer();
?>
