<?php
  include_once("slickbooks_fns.php");
  session_start();

  do_html_header("Add Transaction");
  do_html_heading("Add Transaction");

  display_insert_transaction_form();
  
  do_html_footer();
?>
