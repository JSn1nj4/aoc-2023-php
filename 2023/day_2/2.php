<?php

class Multiplier
{
	public function __construct(private array $colors = []) {}

	public function maybeSetCount(string $color, int $count): void
	{
		if (!array_key_exists($color, $this->colors)) $this->colors[$color] = 0;

		if ($count > $this->colors[$color]) {
			$this->colors[$color] = $count;
		}
	}

	public function collect(string $cubes): void
	{
		foreach(explode('; ', $cubes) as $group) {
			foreach(explode(', ', $group) as $sub) {
				[$count, $color] = explode(' ', $sub);

				$this->maybeSetCount($color, $count);
			}
		}
	}

	public function multiply(): int
	{
		return array_product($this->colors);
	}
}

$sum = 0;

$input = fopen(__DIR__ . '/input', 'r');

while($line = fgets($input)) {
	$multiplier = new Multiplier();

	preg_match('/Game (\d+): (.*)/mi', $line, $matches);

	[, $game, $cubes] = $matches;

	$multiplier->collect($cubes);

	$sum += $multiplier->multiply();
}

echo "{$sum}\n";
