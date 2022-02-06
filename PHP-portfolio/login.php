<?php
  session_start();
  require('application_html.php');
  require('library.php');
  $error = [];
  $email= '';
  $password= '';
  
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING);
    if($email === '' || $password === ''){
      $error['login'] = 'blank';
    } else {
      // ログインチェック
      $db = dbconnect();
      $stmt = $db->prepare('select id, name, password from users where email=? limit 1');
      if(!$stmt) {
        die($db->error);
      }
      $stmt->bind_param('s',$email);
      $success = $stmt->execute();
      if(!$success) {
        die($db->error);
      }
      $stmt->bind_result($id,$name,$hash);
      $stmt->fetch();
      if(password_verify($password,$hash)) {
        //ログイン成功
        session_regenerate_id();
        $_SESSION['id'] = $id;
        $_SESSION['name'] = $name;
        header('Location: mypage.php');
        exit();
      } else {
        $error['login'] = 'failed';
      }
    }
  }
?>

<main class="login">
 <div class="form_container">
  <div class="form_grop">
   <h2>ログイン</h2>
   <form action="" method="post">
    <dl>
      <input class= "form" type="text" name="email" size="35" maxlength="255" value="<?php echo h($email); ?>"  placeholder="メールアドレス"/>
      <?php if(isset($error['login']) && $error['login'] === 'blank'): ?>
        <p class="error">* メールアドレスとパスワードをご記入ください.</p>
      <? endif; ?>
      <?php if(isset($error['login']) && $error['login'] === 'failed'): ?>
        <p class="error">* ログインに失敗しました。正しくご記入ください。</p>
      <?php endif ?>
      <input class= "form" type="password" name="password" size="10" maxlength="255" value="<?php echo h($password); ?>" placeholder="パスワード"/>
      <?php if(isset($error['login']) && $error['login'] === 'blank'): ?>
        <p class="error">* パスワードを入力してください</p>
      <? endif; ?>
      <?php if(isset($error['login']) && $error['login'] === 'failed'): ?>
        <p class="error">* パスワードは4文字以上で入力してください</p>
      <?php endif ?>
    </dl>
    <div class="actions">
      <input class="form_btn" type="submit" value="ログインする"/>
    </div>
   </form>
  </div>
 </div>
</main>