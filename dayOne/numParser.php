<?php

$coords = file('./input.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$numbers = [];

foreach ($coords as $s) {
    $intOnly = array_filter(mb_str_split($s), "ctype_digit");

    $numToAdd = reset($intOnly) . end($intOnly);
    $numbers[] = (int)$numToAdd;
    echo "String $s contains number $numToAdd\n";
}

var_export(array_sum($numbers));