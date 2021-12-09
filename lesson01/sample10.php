<?php
date_default_timezone_set('Asia/Tokyo');

$hello='こんにちは';
echo $hello.'<br>';
echo "$hello<br>"; //""は変数を展開できる。計算式等は展開できない。
echo '1+1<br>';
echo "1+1<br>";
echo 1+1 .'<br>'; //.を数字の横につけるときは半角ないしは,にしないとエラーが出る。

for($i=0; $i<366; $i++):
    $time=strtotime("+$i day");
    $day=date('n/j(D)',$time);
    echo $day.'<br>';
endfor;
?>
