<?php

$lines = explode("\n", file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'input.txt'));

$pos = 0;
$depth = 0;

foreach ($lines as $l) {
    [$dir, $amount] = explode(' ', $l);

    switch ($dir) {
        case 'forward':
            $pos += $amount;
            break;
        case 'down':
            $depth += $amount;
            break;
        case 'up':
            $depth -= $amount;
    }
}

echo $pos * $depth;
