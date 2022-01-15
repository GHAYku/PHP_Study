<?php
$price = 1000;

function with_tax($base_price, $tax_rate = 0.1) {
    $sum_price = $base_price + ($base_price * $tax_rate);
    $sum_price = round($sum_price);
    return $sum_price;
}

$fn = "with_tax";
$price = $fn($price, 0.08);
echo $price;
