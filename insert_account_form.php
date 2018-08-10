<?php
  include_once("slickbooks_fns.php");
  session_start();

  do_html_header("Add Account");

  display_insert_account_form();
  
  do_html_footer();
?>
