<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/earlyaccess/hannari.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Sawarabi+Mincho" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Fuzzy+Bubbles&family=Klee+One&family=Yuji+Boku&family=Yuji+Mai&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css"/>
  <title>皆の失敗談</title>
</head>
<body>
  <header>
   <div class="container_logout">
    <div class="logo_area">
     <a href="top.php">
      <img src="LOGO.PNG" >
     </a>
    </div>
    <?php if (isset($_SESSION['name']) && isset($_SESSION['id'])): ?>
     <div>
      <a href="logout.php?id=" class="btns">ログアウト</a>
     </div>
    <?php endif; ?>
  </header>
  <footer>
    <div class="container">
     <div class="gest-login">
     </div>
    </div>
   </footer>
</body>
</html>