<?php

$input = fopen(__DIR__ . '/input', 'r');

$nums = [];

while ($line = fgets($input)) {
	preg_match_all('/(?=([1-9]|one|two|three|four|five|six|seven|eight|nine))/m', $line, $matches);

	$digits = array_map(static fn ($item) => match($item) {
			'one' => '1',
			'two' => '2',
			'three' => '3',
			'four' => '4',
			'five' => '5',
			'six' => '6',
			'seven' => '7',
			'eight' => '8',
			'nine' => '9',
			default => $item,
		}, $matches[1]);

	$nums[] = (int) ($digits[0] . $digits[count($digits) - 1]);
}

echo array_sum($nums) . "\n";
