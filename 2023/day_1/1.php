<?php

$input = fopen(__DIR__ . '/input', 'r');

$nums = [];

while ($line = fgets($input)) {
    // echo print_r($line, true);

    $digits = str_split(preg_replace('/[^0-9]/m', '', $line));

    // echo print_r("{$digits}\n", true);

    $nums[] = (int) ($digits[0] . $digits[count($digits) - 1]);
}

// print_r($nums);

print_r(array_sum($nums) . "\n");
