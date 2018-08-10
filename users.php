<?php
  include_once("slickbooks_fns.php");
  session_start();

  do_html_header("SlickBooks Users");
  do_html_heading("Users");

  $user_array = get_all_users();
  display_users($user_array);
  
  do_html_footer();
?>
