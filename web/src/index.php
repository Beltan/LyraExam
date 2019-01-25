<?php

require_once('layout.php');
require_once('db.php');
require_once('forms.php');
require_once('ajax.php');

session_start();
connect_db();

// init toggle
if(!isset($_SESSION['toggle'])) {
  $_SESSION['toggle'] = false;
}

// get route if exists
if(isset($_GET['route'])) {
    // in a real application we should do security checks here.. this has multiple security issues
    // ex: check_user_allowed($_GET['route'], $_SESSION['user']);

    $_SESSION['route'] = $_GET['route'];
}

if(isset($_GET['ajax'])) {
    // in a real application we should do security checks here.. this has multiple security issues
    // ex: check_user_allowed($_GET['form'], $_SESSION['user']);

    $_GET['ajax'](); // this is very ugly but very useful :)
    
    close_db();
    die();
}

// process forms
if(isset($_GET['form'])) {
    // in a real application we should do security checks here.. this has multiple security issues
    // ex: check_user_allowed($_GET['form'], $_SESSION['user']);
    
    $_GET['form'](); // this is very ugly but very useful :)

    // after a form we always reload!
    header("Location: ".$_SERVER['PHP_SELF']);
    close_db();
    die();
}

// print

echo_header();

if(!isset($_SESSION['route']) || !isset($_SESSION['user']) || 
      $_SESSION['route'] == 'login_page') {
  require_once('login_page.php');
}
else {
  echo_bar();
  require_once($_SESSION['route'] . '.php');
}

echo_footer();

close_db();

?>