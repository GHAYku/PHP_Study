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
  $db = dbconnect();
  $id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);
  if(!$id) {
    header('Location: mypage.php');
    exit();
  }

?>

<main class="posts">
  <div class="posts_container">
    <?php require('user_menu.php') ?>
      <div class="posts_main">
        <?php $stmt = $db->prepare('select p.id, p.user_id, p.message, p.created, m.name from posts p, users m where p.id=? and m.id=p.user_id order by id desc');
              if(!$stmt){
                die($db->error);
              }
              $stmt->bind_param('i',$id);
              $success = $stmt->execute();
              if(!$success){
                die($db->error);
              }
              $stmt->bind_result($id, $user_id, $message, $created, $name);
              if($stmt->fetch()):
        ?>
        <section class="post_index">
            <div class="account_date">
              <p class="account_name"><?php echo h($name) ?>さんの失敗</p>
            </div>
            <div class="post_main">
              <p class="post_body"><?php echo h($message) ?></p>
            </div>
        </section>
        <?php else: ?>
        <section class="post_index">
            <div class="post_main">
              <p class="post_body">その投稿は削除されたか、URLが間違えています。</p>
            </div>
        </section>
        <?php endif ?>
      </div>
  </div>
</main>