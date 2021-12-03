<?php

$lines = explode("\n", file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'input.txt'));

$windowSize = 3;
$prev = array_slice($lines, 0, $windowSize);
$result = 0;

foreach (array_slice($lines, $windowSize) as $l) {
    $cur = [...array_slice($prev, 1), $l];
    if (array_sum($cur) > array_sum($prev)) {
        $result++;
    }

    $prev = $cur;
}

echo $result;
