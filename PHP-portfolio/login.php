<?php
  require('application_html.php');
?>

<main class="login">
 <div class="form_container">
  <div class="form_grop">
   <h2>ログイン</h2>
   <form action="" method="post">
    <dl>
      <input class= "form" type="text" name="email" size="35" maxlength="255" value=""/>
      <p class="error">* メールアドレスとパスワードをご記入ください</p>
      <p class="error">* ログインに失敗しました。正しくご記入ください。</p>
      <input class= "form" type="password" name="password" size="10" maxlength="20" value=""/>
      <p class="error">* パスワードを入力してください</p>
      <p class="error">* パスワードは4文字以上で入力してください</p>
    </dl>
    <div class="actions">
      <input class="form_btn" type="submit" value="ログインする"/>
    </div>
   </form>
  </div>
 </div>
</main>