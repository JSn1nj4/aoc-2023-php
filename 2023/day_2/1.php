<?php

readonly class ColorSet
{
	public function __construct(private array $colors = []) {}

	public function within(string $color, int $count): bool
	{
		if (!array_key_exists($color, $this->colors)) {
			throw new OutOfRangeException("Key {$color} does not exist in color set.");
		}

		return $this->colors[$color] >= $count;
	}
}

function meets_requirements(ColorSet $colors, string $cubes): bool {
	foreach(explode('; ', $cubes) as $group) {
		foreach(explode(', ', $group) as $sub) {
			[$count, $color] = explode(' ', $sub);

			if (!$colors->within($color, $count)) return false;
		}
	}

	return true;
}

// from day 2.1
$expected = new ColorSet([
	'red' => 12,
	'green' => 13,
	'blue' => 14,
]);

$sum = 0;

$input = fopen(__DIR__ . '/input', 'r');

while($line = fgets($input)) {
	preg_match('/Game (\d+): (.*)/mi', $line, $matches);

	[, $game, $cubes] = $matches;

	if (meets_requirements($expected, $cubes)) $sum += (int)$game;
}

echo "{$sum}\n";
