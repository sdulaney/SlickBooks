<?php

include_once("user_auth_fns.php");
include_once("user_fns.php");

/*
* Prints an HTML header.
*/
function do_html_header($title = "") {
?>
    <!doctype html>
    <html class="no-js" lang="en" dir="ltr">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="x-ua-compatible" content="ie=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>SlickBooks</title>
            <link rel="stylesheet" href="public/css/foundation.min.css">
            <link rel="stylesheet" href="public/css/app.css">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
        </head>
        <body>
          <div class="app-dashboard shrink-large">
            <div class="row expanded app-dashboard-top-nav-bar top-bar">
              <div class="columns medium-2 top-bar-left">
                <button data-toggle="app-dashboard-sidebar" class="menu-icon hide-for-medium"></button>
                <div class="app-dashboard-logo-container">
                  <img src="http://www.smccs85.com/~sdulaney/project/public/images/logo.png" id="logo-image">
                  <a href="http://www.smccs85.com/~sdulaney/project/" class="app-dashboard-logo">SlickBooks</a>
                </div>
              </div>
<?php
  if (check_user()) {
?>
              <div class="columns shrink app-dashboard-top-bar-actions top-bar-right">
              <span id="greeting">Welcome, <?php echo get_user_name($_SESSION["userid"]) . "!"; ?></span>
              <button id="btn_new_account" class="button hollow">New Account</button>
              <button id="btn_new_transaction" class="button hollow">New Transaction</button>
              <form action="index.php" method="post">
                <input type="hidden" name="logout" value="logout">
                <button class="button hollow" type="submit" value="Submit">Logout</button>
              </form>
              </div>
<?php
  } else {
?>
              <div class="columns shrink app-dashboard-top-bar-actions top-bar-right">
                <button id="btn_register" class="button hollow">Register</button>
                <button id="btn_login" class="button hollow">Login</button>
              </div>
<?php
  }
?>
            </div>
            <div class="app-dashboard-body off-canvas-wrapper">
              <div id="app-dashboard-sidebar" class="app-dashboard-sidebar position-left off-canvas off-canvas-absolute reveal-for-medium" data-off-canvas>
                <div class="app-dashboard-sidebar-title-area">
                  <div class="app-dashboard-close-sidebar">
                    <h3 class="app-dashboard-sidebar-block-title">Items</h3>
                    <!-- Close button -->
                    <button id="close-sidebar" data-app-dashboard-toggle-shrink class="app-dashboard-sidebar-close-button show-for-medium" aria-label="Close menu" type="button">
                    <span aria-hidden="true"><a href="#"><i class="large fa fa-angle-double-left"></i></a></span>
                    </button>
                  </div>
                  <div class="app-dashboard-open-sidebar">
                    <button id="open-sidebar" data-app-dashboard-toggle-shrink class="app-dashboard-open-sidebar-button show-for-medium" aria-label="open menu" type="button">
                    <span aria-hidden="true"><a href="#"><i class="large fa fa-angle-double-right"></i></a></span>
                    </button>
                  </div>
                </div>
                <div class="app-dashboard-sidebar-inner">
                  <ul class="menu vertical">
                    <li><a href="http://www.smccs85.com/~sdulaney/project/" class="is-active">
                      <i class="large fa fa-credit-card"></i><span class="app-dashboard-sidebar-text">Transactions</span>
                    </a></li>
                    <li><a href="http://www.smccs85.com/~sdulaney/project/accounts.php">
                      <i class="large fa fa-institution"></i><span class="app-dashboard-sidebar-text">Accounts</span>
                    </a></li>
                    <li><a href="http://www.smccs85.com/~sdulaney/project/users.php">
                      <i class="large fa fa-users"></i><span class="app-dashboard-sidebar-text">Users</span>
                    </a></li>
                    </ul>
                </div>
              </div>
              <div class="app-dashboard-body-content off-canvas-content" data-off-canvas-content>
<?php
}

/*
* Prints an HTML footer.
*/
function do_html_footer() {
?>
                </div>
              </div>
            </div>
            <script src="public/js/vendor/jquery.js"></script>
            <script src="public/js/vendor/what-input.js"></script>
            <script src="public/js/vendor/foundation.min.js"></script>
            <script src="public/js/app.js"></script>
        </body>
    </html>
<?php
}

/*
* Prints an HTML heading.
* This function was adapted from PHP and MySQL Web Development by Welling, Thomson, Chapter 31 - Build a Shopping Cart:
* https://www.pearson.com/us/higher-education/program/Welling-PHP-and-My-SQL-Web-Development-5th-Edition/PGM38406.html
*/
function do_html_heading($heading) {
?>
  <h1 class="h3"><?php echo htmlspecialchars($heading); ?></h1>
<?php
}

/*
* Display all users in the array passed in in an HTML table. 
*/
function display_users($user_array) {
  if (!is_array($user_array)) {
    echo "<p>No users have been entered.</p>";
  } else {
    echo "<table>";
    echo "<tr><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>City</th><th>State</th><th>Zip Code</th><th>Country</th></tr>";
    foreach ($user_array as $row) {
      echo "<tr><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["address"] . "</td><td>" . $row["city"] . "</td><td>" . $row["state"] . "</td><td>" . $row["zip"] . "</td><td>" . $row["country"] . "</td></tr>";
    }
    echo "</table>";
  }
}

/*
* Display all accounts in the array passed in in an HTML table. 
*/
function display_accounts($account_array) {
  if (!is_array($account_array)) {
    echo "<p>No accounts have been entered.</p>";
  } else {
    echo "<table>";
    echo "<tr><th>Company</th><th>Name</th><th>Type</th></tr>";
    foreach ($account_array as $row) {
      echo "<tr><td>" . get_account_owner($row["accountid"]) . "</td><td>" . $row["name"] . "</td><td>" . $row["type"] . "</td></tr>";
    }
    echo "</table>";
  }
}

/*
* Display all transactions in the array passed in in an HTML table. 
*/
function display_transactions($transaction_array) {
  if (!is_array($transaction_array)) {
    echo "<p>No transactions have been entered.</p>";
  } else {
    echo "<table>";
    echo "<tr><th>Company</th><th>Account</th><th>Description</th><th>Type</th><th>Payee</th><th>Amount</th><th>Date</th><th>Category</th></tr>";
    foreach ($transaction_array as $row) {
      $time = strtotime($row["date"]);
      $formatted_date = date("m-d-Y", $time);
      setlocale(LC_MONETARY, 'en_US.UTF-8');
      echo "<tr><td>" . get_account_owner($row["accountid"]) . "</td><td>" . get_account_name($row["accountid"]) . "</td><td>" . $row["description"] . "</td><td>" . $row["type"]. "</td><td>" . $row["payee"] . "</td><td>" . money_format("%.2n", $row["amount"]) . "</td><td>" . $formatted_date . "</td><td>" . $row["category"] . "</td></tr>";
    }
    echo "</table>";
  }
}

/*
* Displays the login form.
*/
function display_login_form() {
?>
  <form action="index.php" method="post">
    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="medium-6 cell">
          <h3>Login</h3>
          <label for="email">Username (Email)
            <input type="email" id="email" name="email">
          </label>
          <label for="password">Password
            <input type="password" id="password" name="password">
          </label>
          <input type="submit" class="button" value="Login">
        </div>
      </div>
    </div>
  </form>
<?php
}

/*
* Displays the form to insert a transaction.
*/
function display_insert_transaction_form() {
?>
  <form action="insert_transaction.php" method="post">
    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="medium-6 cell">
          <h3>Add Transaction</h3>
          <label for="email">Account
            <select name="accountid">
<?php
  $account_array = get_accounts();
  foreach ($account_array as $account) {
    echo "<option value=\"" . htmlspecialchars($account["accountid"]) . "\">" . htmlspecialchars($account["name"]) . "</option>";
  }
?>
            </select>
          </label>
          <label for="description">Description
            <input type="text" id="description" name="description">
          </label>
          <label for="type">Type
            <select id="type" name="type">
              <option value="Expense">Expense</option>
              <option value="Check">Check</option>
              <option value="Vendor Credit">Vendor Credit</option>
            </select>
          </label>
          <label for="payee">Payee
            <input type="text" id="payee" name="payee">
          </label>
          <label for="amount">Amount
            <input type="number" id="amount" name="amount">
          </label>
          <label for="date">Date
            <input type="date" id="date" name="date">
          </label>
          <label for="category">Category
            <select id="category" name="category">
              <option value="Advertising & Marketing">Advertising & Marketing</option>
              <option value="Bank Charges & Fees">Bank Charges & Fees</option>
              <option value="Car & Truck">Car & Truck</option>
              <option value="Contractors">Contractors</option>
              <option value="Insurance">Insurance</option>
              <option value="Interest Paid">Interest Paid</option>
              <option value="Job Supplies">Job Supplies</option>
              <option value="Legal & Professional Services">Legal & Professional Services</option>
              <option value="Meals & Entertainment">Meals & Entertainment</option>
              <option value="Office Supplies & Software">Office Supplies & Software</option>
              <option value="Other Business Expenses">Other Business Expenses</option>
              <option value="Rent & Lease">Rent & Lease</option>
              <option value="Repairs & Maintenance">Repairs & Maintenance</option>
              <option value="Taxes & Licenses">Taxes & Licenses</option>
              <option value="Travel">Travel</option>
              <option value="Utilities">Utilities</option>
            </select>
          </label>
          <input type="submit" class="button" value="Save">
        </div>
      </div>
    </div>
  </form>
<?php
}

/*
* Displays the form to insert an account.
*/
function display_insert_account_form() {
?>
  <form action="insert_account.php" method="post">
    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="medium-6 cell">
          <h3>Add Account</h3>
          <input type="hidden" name="userid" value="<?php echo $_SESSION["userid"]; ?>">
          <label for="name">Name
            <input type="text" id="name" name="name">
          </label>
          <label for="type">Type
            <select id="type" name="type">
              <option value="Bank">Bank</option>
              <option value="Credit Card">Credit Card</option>
              <option value="Other Current Assets">Other Current Assets</option>
            </select>
          </label>
          <input type="submit" class="button" value="Save">
        </div>
      </div>
    </div>
  </form>
<?php
}

/*
* Displays all details for the transaction passed in as an associative array.
*/
function display_transaction_details($transaction_array) {
  if (is_array($transaction_array)) {
    $time = strtotime($transaction_array["date"]);
    $formatted_date = date("m-d-Y", $time);
    setlocale(LC_MONETARY, 'en_US.UTF-8');
    echo "<table>";
    echo "<tr><th>Company</th><td>" . get_account_owner($transaction_array["accountid"]) . "</td></tr>";
    echo "<tr><th>Account</th><td>" . get_account_name($transaction_array["accountid"]) . "</td></tr>";
    echo "<tr><th>Description</th><td>" . $transaction_array["description"] . "</td></tr>";
    echo "<tr><th>Type</th><td>" . $transaction_array["type"] . "</td></tr>";
    echo "<tr><th>Payee</th><td>" . $transaction_array["payee"] . "</td></tr>";
    echo "<tr><th>Amount</th><td>" . money_format("%.2n", $transaction_array["amount"]) . "</td></tr>";
    echo "<tr><th>Date</th><td>" . $formatted_date . "</td></tr>";
    echo "<tr><th>Category</th><td>" . $transaction_array["category"] . "</td></tr>";
    echo "</table>";
  }
}

/*
* Displays form to register a new user account.
*/
function display_register_form() {
?>
  <form action="register.php" method="post">
    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="medium-6 cell">
          <h3>Register</h3>
          <label for="name">Name
            <input type="text" id="name" name="name">
          </label>
          <label for="email">Email
            <input type="email" id="email" name="email">
          </label>
          <label for="password">Password
            <input type="password" id="password" name="password">
          </label>
          <label for="confirm_password">Confirm Password
            <input type="password" id="confirm_password" name="confirm_password">
          </label>
          <label for="phone">Phone
            <input type="tel" id="phone" name="phone">
          </label>
          <label for="address">Address
            <input type="text" id="address" name="address">
          </label>
          <label for="city">City
            <input type="text" id="city" name="city">
          </label>
          <label for="state">State
            <input type="text" id="state" name="state">
          </label>
          <label for="zipcode">Zip Code
            <input type="text" id="zipcode" name="zipcode">
          </label>
          <label for="country">Country
            <input type="text" id="country" name="country">
          </label>
          <input type="submit" class="button" value="Submit">
        </div>
      </div>
    </div>
  </form>
<?php
}

/*
* Displays form to filter transactions.
*/
function display_transaction_filter_form() {
?>
  <form action="index.php" method="post">
      <div class="grid-x grid-padding-x">
        <div class="medium-2 cell">
          <h2 id="transaction-filter-form-submit-title" class="h6 subheader">Filter by Date Range:</h2>
        </div>
        <div class="medium-2 cell">
          <label for="filter_start_date">Start
            <input type="date" id="filter_start_date" name="filter_start_date">
          </label>
        </div>
        <div class="medium-2 cell">
          <label for="filter_end_date">End
            <input type="date" id="filter_end_date" name="filter_end_date">
          </label>
        </div>
        <div class="medium-2 cell">
          <button type="submit" id="transaction-filter-form-submit-btn" class="button" value="Search">
            <i class="fa fa-filter"></i> Filter
          </button>
        </div>
      </div>
  </form>

<?php
}

/*
* Displays a success callout.
*/
function display_success_callout($heading, $paragraph, $link, $url) {
  echo "<div class=\"callout success\">";
  echo "<h5>$heading</h5>";
  echo "<p>$paragraph</p>";
  echo "<a class=\"button\" href=\"$url\">$link</a>";
  echo "</div>";
}

/*
* Displays an alert callout.
*/
function display_alert_callout($heading, $paragraph, $link, $url) {
  echo "<div class=\"callout alert\">";
  echo "<h5>$heading</h5>";
  echo "<p>$paragraph</p>";
  echo "<a class=\"button\" href=\"$url\">$link</a>";
  echo "</div>";
}

?>