<?php
  session_start();
  require('application_html.php');
  require('library.php');

  if (isset($_SESSION['name']) && isset($_SESSION['id'])){
    $id   =  $_SESSION['id'];
    $name = $_SESSION['name'];
  } else {
    header('Location: login.php');
    exit();
  }

  $post_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
  if(!$post_id) {
    header('Location: mypage.php');
    exit();
  }

  $db = dbconnect();
  $stmt = $db->prepare('delete from posts where id=? and user_id=? limit 1');
  if(!$stmt) {
    die($db->error);
  }
  $stmt->bind_param('ii', $post_id, $id);
  $success = $stmt->execute();
  if(!$success){
    die($db->error);
  }
  header('Location: mypage.php'); exit();
?>