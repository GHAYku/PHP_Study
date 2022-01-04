<?php 

$point =69;
$kesseki = 5;
if($point < 50 || $kesseki >= 5){
  echo '不合格';
} else if ($point < 70) {
  echo '合格';
} else  {
  echo '秀';
}