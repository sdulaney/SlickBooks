<?php

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
          <div class="app-dashboard shrink-medium">
            <div class="row expanded app-dashboard-top-nav-bar top-bar">
              <div class="columns medium-2 top-bar-left">
                <button data-toggle="app-dashboard-sidebar" class="menu-icon hide-for-medium"></button>
                <a class="app-dashboard-logo">SlickBooks</a>
              </div>
              <div class="columns shrink app-dashboard-top-bar-actions top-bar-right">
                <button href="#" class="button hollow">Login</button>
                <a href="#" height="30" width="30" alt=""><i class="fa fa-info-circle"></i></a>
              </div>
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
                    <li><a href="#" class="is-active">
                      <i class="large fa fa-credit-card"></i><span class="app-dashboard-sidebar-text">Transactions</span>
                    </a></li>
                    <li><a>
                      <i class="large fa fa-institution"></i><span class="app-dashboard-sidebar-text">Accounts</span>
                    </a></li>
                    <li><a>
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
  <h2 class="text-center"><?php echo htmlspecialchars($heading); ?></h2>
<?php
}

?>