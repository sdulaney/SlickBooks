$(document).foundation();
$('[data-app-dashboard-toggle-shrink]').on('click', function(e) {
  e.preventDefault();
  $(this).parents('.app-dashboard').toggleClass('shrink-medium').toggleClass('shrink-large');
});
$('#btn_login').on('click', function() {
  window.location.href = "http://www.smccs85.com/~sdulaney/project/login_form.php";
});
$('#btn_new_transaction').on('click', function() {
  window.location.href = "http://www.smccs85.com/~sdulaney/project/insert_transaction_form.php";
});
$('#btn_register').on('click', function() {
  window.location.href = "http://www.smccs85.com/~sdulaney/project/register_form.php";
});
$('#btn_new_account').on('click', function() {
  window.location.href = "http://www.smccs85.com/~sdulaney/project/insert_account_form.php";
});
