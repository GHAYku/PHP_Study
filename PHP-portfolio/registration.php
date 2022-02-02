<?php
  require('application_html.php');
  $form = [];
  $error = [];
  $form['name'] = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
  if ($form['name'] === ''){
    $error['name'] = 'blank';
  }
?>

<main class="login">
 <div class="form_container">
  <div class="form_grop">
   <h2>アカウント作成</h2>
   <form action="" method="post" enctype="multipart/form-data">
    <dl>
      <input class= "form" type="text" name="name" size="35" maxlength="255" value="<?php echo htmlspecialchars($form['name'], ENT_QUOTES); ?>"/>
      <?php if(isset($error['name']) && $error['name'] === 'blank'): ?>
       <p class="error">* ニックネームを入力してください</p>
      <?php endif; ?>
      <input class= "form" type="text" name="email" size="35" maxlength="255" value=""/>
      <p class="error">* メールアドレスを入力してください</p>
      <input class= "form" type="password" name="password" size="10" maxlength="20" value=""/>
      <p class="error">* パスワードを入力してください</p>
      <p class="error">* パスワードは4文字以上で入力してください</p>
    </dl>
    <div class="actions">
      <input class="form_btn" type="submit" value="入力内容を確認する"/>
    </div>
   </form>
  </div>
 </div>
</main>