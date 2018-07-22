<?php

/*
* Returns TRUE if each variable has a value. Otherwise, returns FALSE.
* This function was copied from PHP and MySQL Web Development by Welling, Thomson, Chapter 31 - Build a Shopping Cart:
* https://www.pearson.com/us/higher-education/program/Welling-PHP-and-My-SQL-Web-Development-5th-Edition/PGM38406.html
*/
function filled_out($form_vars) {
    foreach ($form_vars as $key => $value) {
       if ((!isset($key)) || ($value == '')) {
          return false;
       }
    }
    return true;
}

?>
