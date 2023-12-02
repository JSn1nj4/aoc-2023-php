<?php

$input = fopen(__DIR__ . '/input', 'r');

$nums = [];

while ($line = fgets($input)) {
    $digits = str_split(preg_replace('/[^0-9]/m', '', $line));

    $nums[] = (int) ($digits[0] . $digits[count($digits) - 1]);
}

echo array_sum($nums) . "\n";
