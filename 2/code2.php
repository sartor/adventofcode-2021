<?php

$lines = explode("\n", file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'input.txt'));

$pos = 0;
$aim = 0;
$depth = 0;

foreach ($lines as $l) {
    [$dir, $amount] = explode(' ', $l);

    switch ($dir) {
        case 'forward':
            $pos += $amount;
            $depth += $aim * $amount;
            break;
        case 'down':
            $aim += $amount;
            break;
        case 'up':
            $aim -= $amount;
    }
}

echo $pos * $depth;
