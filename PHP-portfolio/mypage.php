<?php
  session_start();
  require('application_html.php');
  require('library.php');

  if (isset($_SESSION['name']) && isset($_SESSION['id'])){
    $name = $_SESSION['name'];
  } else {
    header('Location: login.php');
    exit();
  }
?>