<?php
    $memo = filter_input(INPUT_POST,"memo",FILTER_SANITIZE_SPECIAL_CHARS);
    require('db_connect.php');
    $stmt = $db->prepare('insert into memos(memo) values(?)');
    if(!$stmt):
      die($db->error);
    endif;
    $stmt->bind_param('s',$memo);
    $ret = $stmt->execute();
    if($ret):
      echo '登録されました';
    else:
      $db->error;
    endif;
?>