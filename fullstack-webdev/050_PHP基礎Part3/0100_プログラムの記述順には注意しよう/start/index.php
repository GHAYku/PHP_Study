<?php
$num = 0;
counter(2);

function counter($step = 1) {
    global $num;
    $num += $step;
    echo $num;
    return $num;
}
counter(2);