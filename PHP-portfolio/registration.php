<?php
  session_start();
  require('application_html.php');
  $form = [
    'name' => '',
    'email' =>'',
    'password'=>''
  ];
  $error = [];
  /*フォームの内容をチェックする */
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form['name'] = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    if ($form['name'] === ''){
      $error['name'] = 'blank';
    }
    $form['email'] = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    if ($form['email'] === ''){
      $error['email'] = 'blank';
    }
    $form['password'] = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    if ($form['password'] === ''){
      $error['password'] = 'blank';
    } else if(strlen($form['password']) < 4){
      $error['password'] = 'length';
    }

    if(empty($error)){
      $_SESSION['form'] = $form;
      header('Location: check.php');
      exit();
    }
  }

  /*htmlspecialcharsを短くする */
  function h($value){
    return htmlspecialchars($value, ENT_QUOTES);
  }
?>

<main class="login">
 <div class="form_container">
  <div class="form_grop">
   <h2>アカウント作成</h2>
   <form action="" method="post" enctype="multipart/form-data">
    <dl>
      <input class= "form" type="text" name="name" size="35" maxlength="255" value="<?php echo h($form['name']); ?>"/>
      <?php if(isset($error['name']) && $error['name'] === 'blank'): ?>
       <p class="error">* ニックネームを入力してください</p>
      <?php endif; ?>

      <input class= "form" type="text" name="email" size="35" maxlength="255" value="<?php echo h($form['email']); ?>"/>
      <?php if(isset($error['email']) && $error['email'] === 'blank'): ?>
       <p class="error">* メールアドレスを入力してください</p>
      <?php endif ?>
      <p class="error">* 指定されたメールアドレスはすでに登録されています。</p>

      <input class= "form" type="password" name="password" size="10" maxlength="20" value="<?php echo h($form['password']); ?>"/>
      <?php if(isset($error['password']) && $error['password'] === 'blank'): ?>
       <p class="error">* パスワードを入力してください</p>
      <?php endif ?>
      <?php if(isset($error['password']) && $error['password'] === 'length'): ?>
       <p class="error">* パスワードは4文字以上で入力してください</p>
      <?php endif ?>
    </dl>
    <div class="actions">
      <input class="form_btn" type="submit" value="入力内容を確認する"/>
    </div>
   </form>
  </div>
 </div>
</main>