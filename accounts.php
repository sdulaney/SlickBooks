<?php
  include_once("slickbooks_fns.php");
  session_start();

  do_html_header("SlickBooks Accounts");
  do_html_heading("Accounts");

  $account_array = get_all_accounts();
  display_accounts($account_array);
  
  do_html_footer();
?>
