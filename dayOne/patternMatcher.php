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
$pattern = join('|', array_keys($validValues)) . '|\\d';

$numbers = [];

foreach ($coords as $s) {
    $matches = [];
    if (!preg_match_all("/$pattern/i", $s, $matches) > 0) {
        continue;
    }
    $pregs = array_filter(array_values($matches[0]), function ($val) {
        return ctype_digit($val) | ctype_alpha($val);
    });

    $firstNum = ctype_alpha(reset($pregs)) ? $validValues[reset($pregs)] : reset($pregs);
    $lastNum = ctype_alpha(end($pregs)) ? $validValues[end($pregs)] : end($pregs);
    $numToAdd = $firstNum . $lastNum;

    echo var_export((int)$numToAdd) . "\n";
    $numbers[] = (int)$numToAdd;
}
var_export(array_sum($numbers));