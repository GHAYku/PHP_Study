<?php

$arry = [
  'name' => 'Bob',
  'age' => 12,
  'sports' => ['baseball', 'swimming']
];
unset($arry['name']);
echo $arry['name'];
$arry['age'] += 24;
echo $arry['age'];
echo $arry['sports'][1];

?>