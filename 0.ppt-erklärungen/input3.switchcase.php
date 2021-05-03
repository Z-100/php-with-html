<?php
    $i = 4;
    $j = 4;

    switch ($i) {
        case 1:
            echo "i is 1";
            break;
        case 2:
            echo "i is 2";
            break;
        case 3:
            echo "i is 3";
            break;
        case $i = $j:
            echo "i is 4";
            break;
        case 5:
            echo "i is 5";
            break;
        default:
            echo "i is not a number";
            break;
    }