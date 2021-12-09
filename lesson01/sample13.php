<?php
date_default_timezone_set('Asia/Tokyo');
$time=date('G');
?>

<?php if($time<17): ?>
  <p>※ 営業時間外です</p>
<?php else: ?>
  <p>ようこそ</p>
<?php endif; ?>

<?php
$s='abcd';
if ($s):
  echo '$sには文字が入っています';
endif;

//↑($s !== ''):と同じ意味。
//文字が入っているとtrue入っていないとfairsになる特性を利用したもの
//!==はイコールではない。という意味。

$x=0;
if($x): //$x !== 0
  echo '$xは0ではありません';
endif;

if(!$x): //$x === 0 !を先頭につけると、判定は反転する。
  echo '$xは0です';
endif;
?>

