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
  //メッセージの投稿
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
  $stmt = $db->prepare('insert into posts (message, user_id) values(?,?)');
  if (!$stmt) {
    die($db->error);
  }
  $stmt->bind_param('si', $message, $id);
  $success = $stmt->execute();
  if(!$success) {
    die($db->error);
  }
  header('Location: mypage.php');
  exit();
}
?>

<main class="posts">
  <div class="posts_container">
    <?php require('user_menu.php') ?>
      <div class="posts_main">
        <section class="post_index">
         <form action="" method="post">
            <div class="post_form_body">
              <textarea name="message" cols="50" rows="5" class="post_body_form" placeholder="失敗談を投稿してみよう。"></textarea>
            </div>
            <div class="post_form_btn">
             <input type="submit" value="投稿" class="form_btn"/>
            </div>
        </section>
        <?php $stmt = $db->prepare('select p.id, p.user_id, p.message, p.created, m.name from posts p, users m where m.id=p.user_id order by id desc');
              if(!$stmt){
                die($db->error);
              }
              $success = $stmt->execute();
              if(!$success){
                die($db->error);
              }
              $stmt->bind_result($id, $user_id, $message, $created, $name);
              while($stmt->fetch()):
        ?>
        <section class="post_index">
            <div class="account_date">
              <p class="account_name"><?php echo h($name) ?>さんの失敗</p>
            </div>
            <div class="post_main">
              <a href="show.php?id=<?php echo h($id) ?>">
                <p class="post_body"><?php echo h($message) ?></p>
              </a>
              <?php if($_SESSION['id'] === $user_id): ?>
               <a href="delete.php?id=<?php echo h($id); ?>" class="error">削除</a>
              <?php endif; ?>
            </div>
        </section>
        <?php endwhile ?>
      </div>
  </div>
</main>
