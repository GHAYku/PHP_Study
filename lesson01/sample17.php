<?php
$news = file_get_contents('date/news.txt');
echo $news;

// ファイルの追記
$news = $news . "<br>追加のニュースです";
$success = file_put_contents('date/news.txt', $news);


// readfile('date/news.txt');
?>