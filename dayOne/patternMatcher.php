<?php

$coords = file('./input.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$validValues = [
    "one" => "1",
    "two" => "2",
    "three" => "3",
    "four" => "4",
    "five" => "5",
    "six" => "6",
    "seven" => "7",
    "eight" => "8",
    "nine" => "9"];

$numbers = [];

foreach ($coords as $s) {
    echo "$s turns into ";
    foreach (array_keys($validValues) as $pattern) {
        $s = str_replace($pattern, "$pattern$validValues[$pattern]$pattern", $s);
    }

    echo "$s, which becomes ";
    $intOnly = array_filter(mb_str_split($s), "ctype_digit");
    echo join('', $intOnly) . "\n";

    $numToAdd = reset($intOnly) . end($intOnly);

    echo var_export($numToAdd, true) . "\n";
    $numbers[] = (int)$numToAdd;
}
var_export(array_sum($numbers));