<?php
/*税込み金額を返す*/
function intax($value){
    return ceil($value * 1.1);
}

$price = 153280;
$price_tax = intax($price);
echo $price_tax;
?>