<?php
session_start();
require('application_html.php');
require('library.php');
if (isset($_SESSION['form'])) {
  $form = $_SESSION['form'];
} else {
  header('Location: registration.php');
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $db = dbconnect();
  $stmt = $db->prepare('insert into users(name,email,password,picture) VALUES(?,?,?)');
  if (!$stmt) {
    die($db->error);
  }
  $password = password_hash($form['password'],PASSWORD_DEFAULT);
  $stmt->bind_param('ssss', $form['name'], $form['email'],$password);
  $success = $stmt->execute();
  if (!$success) {
    die($db->error);
  }

  unset($_SESSION['form']);
  header('Location: mypage.php');
}

?>


<main class="login">
  <div class="form_container">
    <div class="form_grop">
      <h2>確認</h2>
      <form action="" method="post">
        <p>ニックネーム:<?php echo h($form['name']) ?></p>
        <p>メールアドレス:<?php echo h($form['email']) ?></p>
        <p>パスワード:表示されません</p>
        <div class="actions">
          <input class="form_btn" type="submit" value="この内容で登録する" />
          <a href="registration.php?action=rewrite">書き直す</a>
        </div>
      </form>
    </div>
  </div>
</main>